@extends('layouts.app')

@section('content')
	
<div class="page-blog-details section-padding--lg bg--white">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-9 col-12">
				<div class="blog-details content">

					<article class="blog-post-details">

						@if ($post->media->count() > 0)
							<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">

									@foreach ($post->media as $media)

										<li data-target="#carouselIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : ''}}"></li>

									@endforeach

								</ol>
								<div class="carousel-inner">

									@foreach($post->media as $media)

										<div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}">
											<img src="{{ asset('assets/posts/' . $media->file_name) }}" class="d-block w-100" alt="{{ $post->title }}">
										</div>

									@endforeach

								</div>
								@if ($post->media->count() > 1)
									<a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								@endif
							</div>
						@endif

						<div class="post_wrapper">
							<div class="post_header">
								<h2>{{ $post->title }}</h2>
								<div class="blog-date-categori">
									<ul>
										<li>{{ $post->created_at->format('M d, Y') }}</li>
										<li><a href="#" title="Posts by {{ $post->user->name }}" rel="author">{{ $post->user->name }}</a></li>
									</ul>
								</div>
							</div>
							<div class="post_content">
								<p>
									{!! $post->description !!}
									
								</p>
							</div>
							<ul class="blog_meta">
								{{-- <li><a href="#">{{ $post->approved_comments->count() }} comment(s)</a></li> --}}
								{{-- <li> / </li> --}}
								<li>Category: <span style="color:red">{{ $post->category->name }}</span></li>
							</ul>
						</div>
					</article>


					<div class="comments_area">

						<h3 class="comment__title">{{ $post->approved_comments->count() }} comment(s)</h3>

						<ul class="comment__list">

							@forelse ($post->approved_comments as $comment)
							<li>
								<div class="wn__comment">
									<div class="thumb">
										<img src="{{ asset('frontend/images/blog/comment/1.jpeg') }}" alt="comment images">
									</div>
									<div class="content">
										<div class="comnt__author d-block d-sm-flex">
											<span><a href="{{ $comment->url != '' ? $comment->url : '#' }}">{{ $comment->name }}</a></span>
											<span>{{ $comment->created_at->format('M d Y h:i a') }}</span>
										</div>
										<p>{{ $comment->comment }}</p>
									</div>
								</div>
							</li>
							@empty
								<p>no comments yet.</p>
							@endforelse
							
							
						</ul>

					</div>


					<div class="comment_respond">
						<h3 class="reply_title">Leave a Comment</h3>

						<form class="comment__form" action="{{ route('post.add.comment', $post->slug) }}" method="POST">
							@csrf
							<p>Your email address will not be published.Required fields are marked </p>
							<div class="input__box">
								<textarea name="comment" placeholder="Your comment here">{{ old('comment') }}</textarea>
								<span class="text-danger">
									@error('comment')
									{{ $message }}
								@enderror
								</span>
							</div>
							
							<div class="input__wrapper clearfix">
								<div class="input__box name one--third">
									<input type="text" placeholder="name" name="name" {{ old('name') }}>
									<span class="text-danger">
										@error('name')
										{{ $message }}
										@enderror
									</span>
								</div>
								
								
								<div class="input__box email one--third">
									<input type="email" placeholder="email" name="email" {{ old('email') }}>
									<span class="text-danger">
										@error('email')
										{{ $message }}
										@enderror
									</span>
								</div>
								
								<div class="input__box website one--third">
									<input type="text" placeholder="website" name="url" {{ old('url') }}>
									<span class="text-danger">
										@error('url')
										{{ $message }}
										@enderror
									</span>
								</div>
							</div>
							<div class="submite__btn">
								<button type="submit" class="btn btn-primary">Comment</button>
							</div>
						</form>
					</div>


				</div>
			</div>



			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
				@include('partial.frontend.sidebar')
			</div>


		</div>
	</div>
</div>

@endsection