
     <header class="mt-50">
         <div class="row">
             <div class="col-md-12 col-12">
                 <div class="js-slider slick-nav-black slick-dotted-inner slick-dotted-white" data-dots="true" data-arrows="true">
                    @forelse($sliders as $slider)
                         <div>
                             <img  width="100%" height="450" src="{{ asset('storage/' . $slider->image) }}" alt="">
                         </div>
                     @empty
                         <div>
                             <img  width="100%" height="450" src="{{ asset('vendor/assets/media/photos/photo21.jpg') }}" alt="">
                         </div>
                         <div>
                             <img width="100%" height="450" src="{{ asset('vendor/assets/media/photos/photo22.jpg') }}" alt="">
                         </div>
                         <div>
                             <img width="100%" height="450" src="{{ asset('vendor/assets/media/photos/photo23.jpg') }}" alt="">
                         </div>
                     @endforelse
                 </div>
             </div>
         </div>
         <div class="tag-line-slider">
             <h2 class="tag-line-title">{{ $banner->title }}</h2>
             <p class="tag-line-desc">{{ $banner->description }}</p>
         </div>

     </header>

