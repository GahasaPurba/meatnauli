<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="metismenu-icon pe-7s-monitor"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Announcement</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Announcement
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        @if (Auth::check() && Auth::user()->role == 'Administrator')
                        <li>
                            <a href="{{ route('announcement.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Announcement
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('announcement.index') }}">
                                <i class="metismenu-icon">
                                </i>Announcement List
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->role == 'Administrator')
                <li class="app-sidebar__heading">Role</li>
                <li>
                    <a href="{{ route('author.index') }}">
                        <i class="metismenu-icon pe-7s-user">
                        </i>Author
                    </a>
                </li>
                <li>
                    <a href="{{ route('seller.index') }}">
                        <i class="metismenu-icon pe-7s-user">
                        </i>Seller
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="metismenu-icon pe-7s-user">
                        </i>User
                    </a>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role == 'Administrator' || Auth::check() && Auth::user()->role == 'Author')
                <li class="app-sidebar__heading">Blog</li>
                @if (Auth::check() && Auth::user()->role == 'Administrator')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-ribbon"></i>
                        Category
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">
                                <i class="metismenu-icon">
                                </i>Category List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-ticket"></i>
                        Tag
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('tag.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Tag
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tag.index') }}">
                                <i class="metismenu-icon">
                                </i>Tag List
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-pen"></i>
                        Post
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('post.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Post
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('post.index') }}">
                                <i class="metismenu-icon">
                                </i>Post List
                            </a>
                        </li>
                        @if (Auth::check() && Auth::user()->role == 'Administrator')
                        <li>
                            <a href="{{ route('post.trash') }}">
                                <i class="metismenu-icon">
                                </i>Post Trash
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if (Auth::check() && Auth::user()->role == 'Administrator' || Auth::check() && Auth::user()->role == 'Seller')
                <li class="app-sidebar__heading">Souvenir</li>
                @if (Auth::check() && Auth::user()->role == 'Administrator')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-ribbon"></i>
                        Category
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('souvenircategory.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('souvenircategory.index') }}">
                                <i class="metismenu-icon">
                                </i>Category List
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cart"></i>
                        Item
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('item.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Item
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('item.index') }}">
                                <i class="metismenu-icon">
                                </i>Item List
                            </a>
                        </li>
                        @if (Auth::check() && Auth::user()->role == 'Administrator')
                        <li>
                            <a href="{{ route('item.trash') }}">
                                <i class="metismenu-icon">
                                </i>Item Trash
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->role == 'Administrator')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Checkout
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('payment2') }}">
                                <i class="metismenu-icon">
                                </i>Checkout List
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @endif
                <li class="app-sidebar__heading">QnA</li>
                @if (Auth::check() && Auth::user()->role == 'Administrator')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-ribbon"></i>
                        Category
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('qnacategory.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('qnacategory.index') }}">
                                <i class="metismenu-icon">
                                </i>Category List
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-comment"></i>
                        Question
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('question.create') }}">
                                <i class="metismenu-icon">
                                </i>Add Question
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('question.index') }}">
                                <i class="metismenu-icon">
                                </i>Question List
                            </a>
                        </li>
                        @if (Auth::check() && Auth::user()->role == 'Administrator')
                        <li>
                            <a href="{{ route('question.trash') }}">
                                <i class="metismenu-icon">
                                </i>Question Trash
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->role == 'Administrator')
                <li class="app-sidebar__heading">User Feedback</li>
                <li>
                    <a href="{{ route('questionnaire.index') }}">
                        <i class="metismenu-icon pe-7s-note"></i>
                        Questionnaire Result
                    </a>
                </li>
                <li class="app-sidebar__heading">Subscription</li>
                <li>
                    <a href="{{ route('mail.index') }}">
                        <i class="metismenu-icon pe-7s-mail"></i>
                        Mailing List
                    </a>
                </li>
                @endif
                <li class="app-sidebar__heading">Profile</li>
                <li>
                    <a href="{{ route('editprofile.edit', Auth::user()->id) }}">
                        <i class="metismenu-icon pe-7s-id"></i>
                        Edit Profile
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
