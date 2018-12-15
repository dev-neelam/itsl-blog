<?php
/**
 * Created by PhpStorm.
 * User: neelam
 * Date: 14/7/17
 * Time: 11:18 AM
 */

?>

<div class="bs-menu-bar bs-padding-5">
    <div class="ui container grid">
        <div class="sixteen wide column row">
            <div class="eight wide column">
                <div class="ui secondary pointing menu">
                    <a class="active item">
                        HOME
                    </a>
                    <a class="item">
                        ABOUT
                    </a>
                    <a class="item">
                        CONTACT
                    </a>
                </div>
            </div>
            <div class="eight wide column right aligned bs-social-icons bs-margin-top-10">
                <span class="bs-margin-right-20">
                    <a href="#">
                        <i class="facebook f icon"></i>
                        facebook
                    </a>
                </span>

                <span class="bs-margin-right-20">
                    <a href="#">
                        <i class="linkedin icon"></i>
                        linkedin
                    </a>
                </span>

                <span class="bs-margin-right-20">
                    <a href="#">
                        <i class="twitter icon"></i>
                        twitter
                    </a>
                </span>

                <span class="bs-margin-right-20">
                    <i class="search link icon"></i>
                    Search
                </span>

                <span class="bs-margin-right-20">
                    @guest
                        <a class="bs-margin-right-20" href="{{ route('register') }}">Sign up</a>
                        <a href="{{ route('login') }}">Sign in</a>
                    @else
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                    @endguest
                </span>
            </div>
        </div>
    </div>
</div>

<div class="ui container bs-logo">
    WORDSMITH <i class="red circle mini icon"></i>
</div>
