{{--app.blade.php　のヘッダーとして include--}}
<header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                {{-- トップページへのリンク --}}
                <a class="navbar-brand" href="/">Meal Manegement</a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav-bar">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                        
                        
                        @if (Auth::check())
                        
                            {{--ユーザ一覧ページへのリンク
                                <li class="nav-item"><a href="#" class="nav-link">Users</a></li>
                            --}}
                            
                            {{--ドロップダウンメニュー--}}
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    
                                    {{-- ユーザ詳細ページへのリンク 
                                        <li class="dropdown-item"><a href="#">マイページ</a></li>
                                        <li class="dropdown-divider"></li>
                                    --}}
                                    
                                    {{-- ログアウトへのリンク --}}
                                    <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                                    
                                </ul>
                                
                            </li>{{--/ドロップダウンメニュー--}}
                            
                        @else
                        
                            {{-- ユーザ登録ページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                            
                            {{-- ログインページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                            
                        @endif
                        
                        
                    </ul>
                </div>
            </nav>
</header>