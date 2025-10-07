<section class="blog_4 mt_110 xs_mt_90 pt_120 xs_pt_100 pb_120 xs_pb_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInLeft">
                <div class="wsus__section_heading heading_left mb_50">
                    <h5>{{__('Latest blogs')}}</h5>
                    <h2>{{__('Our Latest News Feed.')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row blog_4_slider">
        @forelse($blogs as $blog)
            <div class="col-xl-4 col-md-6 wow fadeInUp">
                <div class="wsus__single_blog_vertical" style="display: flex; flex-direction: column; height: 100%; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <a href="{{ route('blog.show',['locale' => request()->route('locale'), 'slug' => $blog->translated_slug]) }}" style="position: relative; width: 100%; height: 280px; display: block; background-color: #f5f5f5; overflow: hidden;">
                        <img src="{{ asset($blog->image) }}" alt="Blog" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        <span class="date" style="position: absolute; top: 20px; left: 20px; color: #fff; font-size: 14px; font-weight: 500; background: var(--colorPrimary); padding: 4px 10px; border-radius: 6px;">
                            {{ date('M d, Y', strtotime($blog->created_at)) }}
                        </span>
                    </a>
                    <div style="padding: 25px; flex: 1; display: flex; flex-direction: column;">
                        <ul style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 15px; list-style: none; padding: 0;">
                            <li style="display: flex; align-items: center; gap: 5px; font-size: 14px; color: #666;">
                                <span><img src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                                        alt="User" class="img-fluid" style="width: 16px;"></span>
                                By {{ $blog->author->name }}
                            </li>
                            <li style="display: flex; align-items: center; gap: 5px; font-size: 14px; color: #666;">
                                <span><img src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                                        alt="Comment" class="img-fluid" style="width: 16px;"></span>
                                {{ $blog->comments()->count() }} {{__('Comments')}}
                            </li>
                        </ul>
                        <a href="{{ route('blog.show',['locale' => request()->route('locale'), 'slug' => $blog->translated_slug]) }}" style="font-size: 20px; font-weight: 600; color: #1a1a1a; margin-bottom: 12px; display: block; text-decoration: none; line-height: 1.4;">
                            {{ Str::limit($blog->translated_title, 60) }}
                        </a>
                        <p style="color: #666; font-size: 15px; line-height: 1.6; margin-bottom: 20px; flex: 1;">
                            {{ Str::limit(strip_tags($blog->translated_description), 100) }}
                        </p>
                        <a href="{{ route('blog.show',['locale' => request()->route('locale'), 'slug' => $blog->translated_slug]) }}" class="common_btn" style="align-self: flex-start;">
                            {{__('Read More')}} <i class="far fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div>{{__('No Blog Found')}}</div>
        @endforelse

    </div>
</section>
