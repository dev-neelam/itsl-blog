@extends('vendor.itsl.layouts.master')

@section('title')
    Wordsmith
@endsection

@section('content')
    <hr/>
    <div class="ui centered grid bs-blog-tags">
        <div class="ui text menu">
            @foreach($categories as $category)
                <a class="item">
                    {{strtoupper($category)}}
                </a>
            @endforeach
        </div>
    </div>
    <hr/>

    <div class="ui grid bs-margin-top-30 bs-padding-50">
        <div class="ui eleven wide column">
            @foreach($posts as $post)
                <img class="ui fluid image" src={{"/$post->id"}}>
                <div class="ui centered grid bs-padding-5 bs-margin-top-20">
                    <div class="ui row">
                        <h2 class="bs-blog-title">{{$post->title}}</h2>
                    </div>
                    <div class="ui row bs-blog-metadata">
                        <p>
                            <span>
                                <i class="red wait icon"></i>
                                <?php
                                    $datetime1 = new DateTime(date('Y-m-d', time()));

                                    $datetime2 = new DateTime($post->publish_date);

                                    $difference = $datetime1->diff($datetime2);
                                    $diff       = '';
                                    if($difference->y) {
                                        $diff  .= $difference->y. $difference->y > 1 ? ' years' : ' year';
                                    }
                                    if($difference->m) {
                                        $diff  .= $difference->m. ($difference->m > 1 ? ' months' : ' month');
                                    }
                                    if($difference->d) {
                                        $diff  .= $difference->d. ($difference->d > 1 ? ' days' : ' day');
                                    }
                                ?>
                                {{$diff}} ago
                            </span>
                            <span>
                                by {{$post->author}}
                            </span>
                            <span>
                                <i class="red comment outline icon"></i>
                                {{\App\Comment::getPostComments($post->id)}}
                            </span>
                        </p>
                    </div>
                    <div class="ui row bs-blog-summary">
                        <p class="wrapper">
                            {!! $post->description !!}
                        </p>
                        <hr/>

                        <div class="eight wide column bs-social-sharing">
                            <div class="ui compact segment">
                                <li><a title="facebook_share" href="#" class="st_facebook_large uk-padding-remove"></a></li>
                                <li><a title="linkedin" href="#" class="st_linkedin_large uk-padding-remove"></a></li>
                                <li><a title="twitter" href="#" class="st_twitter_large uk-padding-remove"></a></li>
                                <li><a title="pinterest" href="#" class="st_pinterest_large uk-padding-remove"></a></li>
                            </div>
                        </div>

                        <div class="eight wide right aligned column bs-read-more">
                            <button class="ui secondary button">
                                <a style="color: #fff" href="{{route('post.read', ['post_id' => $post->id])}}">Continue Reading</a>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

           {{-- <div class="ui right aligned grid">
                <div class="ui right aligned fourteen wide column">
                    <div class="ui row">
                        <span style="color: #666; letter-spacing: 0.15em; font-size: 12px;">OLDER</span>
                    </div>
                    <div class="ui row bs-margin-top-10">
                        <span style="letter-spacing: 0.15em; font-size: 18px;">STORIES</span>
                    </div>
                </div>
                <div class="ui left aligned two wide column">
                    <a href=""><i style="font-size: 3.5em; line-height: 45px; margin-left: -30px;" class="chevron circle right icon"></i></a>
                </div>
            </div>--}}
        </div>
        <div class="ui five wide column bs-sidebar">
            <div class="ui segment">
                <div class="ui centered grid">
                    <h5>ABOUT ME</h5>
                    <hr/>
                    <img class="ui circular centered image" src={{asset("bs/images/Neelam.jpg")}}>
                    <div class="ui row bs-margin-top-20 centered">
                        <p class="bs-serif-font">NEELAM SONI</p><br/>
                        <p class="bs-margin-top-10 bs-self-intro">A messy programmer who loves coding, a day-dreamer who is fond of writing diaries, an optimist who trusts her guts whenever in doubt!</p>
                    </div>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui centered grid">
                    <h5>FOLLOW US</h5>
                    <hr/>
                    <div class="ui row bs-margin-top-20">
                        <div class="ui six wide left aligned column">
                            <i class="circular large facebook f icon"></i>
                            <small>Facebook</small>
                            <br/><br/>
                        </div>
                        <div class="ui six wide right aligned column">
                            <i class="circular large twitter icon"></i>
                            <small>Twitter</small>
                            <br/><br/>
                        </div>
                        <div class="ui six wide left aligned column">
                            <i class="circular large youtube icon"></i>
                            <small>Youtube</small>
                            <br/><br/>
                        </div>
                        <div class="ui six wide right aligned column">
                            <i class="circular large tumblr icon"></i>
                            <small>Tumblr</small>
                            <br/><br/>
                        </div>
                        <div class="ui six wide left aligned column">
                            <i class="circular large linkedin icon"></i>
                            <small>LinkedIn</small>
                            <br/><br/>
                        </div>
                        <div class="ui six wide right aligned column">
                            <i class="circular large google plus icon"></i>
                            <small>Google</small>
                            <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui centered grid">
                    <h5>CATEGORIES</h5>
                    <hr/>
                    <div class="ui left aligned grid bs-margin-top-20">
                        @foreach($categories as $category)
                            <a class="ui basic label bs-lbl-category">{{$category}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui centered grid">
                    <h5>RECENT POSTS</h5>
                    <hr/>
                    @foreach($posts as $post)
                        <div class="ui row bs-margin-top-20 bs-recent-posts">
                            <div class="ui six wide column">
                                <img class="ui fluid tiny image" src={{asset("/$post->id")}}>
                            </div>
                            <div class="ui ten wide column" style="padding-left: 10px !important;">
                                <h2 class="bs-blog-title">{{$post->title}}</h2>
                                <small>{{date('F j, Y', strtotime($post->publish_date))}}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="ui segment">
                <div class="ui centered grid">
                    <h5>BLOG ARCHIVE</h5>
                    <hr/>
                    <div class="ui left aligned grid bs-blog-archive">
                        <ul>
                            @foreach($archives as $month => $posts)
                                <li>{{$month}} ({{count($posts)}})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
