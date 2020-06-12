<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            @if (Auth::user()->role == 'Administrator')
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('post.trash') }}" class="nav-link">
                            Post Trash
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('item.trash') }}" class="nav-link">
                            Item Trash
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('question.trash') }}" class="nav-link">
                            Question Trash
                        </a>
                    </li>
                </ul>
            </div>
            @endif
            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="https://www.del.ac.id/" target="_blank" class="nav-link">
                            &copy; 2020 Kelompok 03 PA 1 - IT Del
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="{{ asset('backend/assets/scripts/main.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
@yield('script')
</body>
</html>
