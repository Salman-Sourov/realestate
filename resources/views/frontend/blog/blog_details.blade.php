@extends('frontend.frontend_dashboard')
@section('main')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-9.png);">
            </div>
            <div class="pattern-2" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-10.png);">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $blog->post_title }} Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $blog->post_title }} Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- Left side --}}
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img
                                            src="{{ !empty($blog->post_image) ? asset($blog->post_image) : url('upload/no_image_blog.png') }}"
                                            alt=""></figure>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <h3>{{ $blog->post_title }}</h3>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img
                                                    src="{{ !empty($blog->user->photo) ? url('upload/admin_images/' . $blog->user->photo) : url('upload/no_image.jpg') }}"
                                                    alt=""></figure>
                                            <h5><a href="">{{ $blog->user->name }}</a></h5>
                                        </li>
                                        <li>{{ $blog->created_at->format('d M Y') }}</li>
                                    </ul>
                                    <div class="text">
                                        <p>{!! $blog->long_descp !!}</p>
                                    </div>
                                    <div class="post-tags">
                                        <ul class="tags-list clearfix">
                                            <li>
                                                <h5>Tags:</h5>
                                            </li>
                                            @foreach ($tags_all as $tag)
                                                <li><a href="">{{ ucwords($tag) }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <div class="group-title">
                                <h4>3 Comments</h4>
                            </div>
                            <div class="comment-box">
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-1.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Rebeka Dawson</h5>
                                            <span>April 10, 2020</span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                                quis nos trud exerc.</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment replay-comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-2.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Elizabeth Winstead</h5>
                                            <span>April 10, 2020</span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, consectur adipisicing elit sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis
                                                nos</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-3.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Benedict Cumbatch</h5>
                                            <span>April 10, 2020</span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                                quis nos trud exerc.</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-form-area">
                            <div class="group-title">
                                <h4>Leave a Comment</h4>
                            </div>

                            @auth
                            <form action="{{ route('store.comment') }}" method="post" class="comment-form default-form">
                                @csrf
                                <input type="hidden"  name="post_id" value="{{ $blog->id }}">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="subject" placeholder="Subject" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your message" required=""></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <p><b>For Add Comment! You need to login first <br> <a href="{{ route('login') }}">Login Here</a></b></p>
                            @endauth
                        </div>
                    </div>
                </div>
                {{-- Right Side --}}
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget search-widget">
                            <div class="widget-title">
                                <h4>Search</h4>
                            </div>
                            <div class="search-inner">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search_field" placeholder="Search" required="">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget social-widget">
                            <div class="widget-title">
                                <h4>Follow Us On</h4>
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="https://tech.empobd.com/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://tech.empobd.com/"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="https://tech.empobd.com/"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://tech.empobd.com/"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://tech.empobd.com/"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h4>Category</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($bcategory as $cat)
                                    @php
                                        $post = App\Models\BlogPost::where('blogcat_id',$cat->id)->get();
                                    @endphp
                                        <li><a href="{{ url('blog/category/'.$cat->id) }}">{{ $cat->category_name }}<span>{{ count($post) }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>Recent Posts</h4>
                            </div>

                            @foreach ($dpost as $item)
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img
                                                src="{{ !empty($item->post_image) ? asset($item->post_image) : url('upload/no_image_blog.png') }}" alt=""></a></figure>
                                    <h5><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h5>
                                    <span class="post-date">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
@endsection
