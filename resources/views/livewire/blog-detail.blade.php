<div>
    <div class="mt-6 bg-gray-50">
        <div class=" px-10 py-6 mx-auto">
              
              <!--author-->
           <div class="max-w-6xl px-10 py-6 mx-auto bg-gray-50">
              
              <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                  <img class="object-cover w-full shadow-sm h-auto" src="{{Storage::url($posts->photo)}}?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80">
              </a>

              <!--post categories-->
              {{-- <div class="flex items-center justify-start mt-4 mb-4">
                  <a href="#"class="px-2 py-1 font-bold bg-red-400 text-white rounded-lg hover:bg-gray-500 mr-4">Django</a>
                  <a href="#"class="px-2 py-1 font-bold bg-red-400 text-white rounded-lg hover:bg-gray-500 mr-4">Python</a>
                  <a href="#"class="px-2 py-1 font-bold bg-red-400 text-white rounded-lg hover:bg-gray-500">web development</a>
               </div> --}}
              <div class="mt-2">
                  <!--post heading-->
                  <a href="#" class="sm:text-3xl md:text-3xl lg:text-3xl xl:text-4xl font-bold text-purple-500  hover:underline">{{ $posts->title }}</a>

                      <!--post views-->
                      <div class="flex justify-start items-center mt-2">
                          <p class="text-sm text-green-500 font-bold bg-gray-100 rounded-full py-2 px-2 hover:text-red-500">3000</p>
                          <p class="text-sm text-gray-400 font-bold ml-5">Views</p>
                      
                      </div>

                      <!--author avator-->
                     {{-- <div class="font-light text-gray-600">
                        
                          <a href="#" class="flex items-center mt-6 mb-6"><img
                                  src="https://avatars.githubusercontent.com/u/71964085?v=4"
                                  alt="avatar" class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block">
                              <h1 class="font-bold text-gray-700 hover:underline">{{ $posts->author_name}}</h1>
                          </a>
                    </div> --}}
             </div>
          
             <!--end post header-->
                  <!--post content-->
       <div class="max-w-4xl px-10  mx-auto text-2xl text-gray-700 mt-4 rounded bg-gray-100">

           <!--content body-->
           <div>
                  <p class="mt-2 p-8">{{ $posts->description }}</p>
           </div>

           

              </div>
          </div>



          <!--form form comments-->
           
   <div class="max-w-4xl py-16 xl:px-8 flex justify-center mx-auto">
                      
      <div class="w-full mt-16 md:mt-0 ">
         <form wire:submit.prevent="save" class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
             <h3 class="mb-6 text-2xl font-medium text-center">Write a comment</h3>
             <input type="hidden" name="blog_id" id="blog_id"  wire:model.live="blog_id" />
             <input type="text" class="w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Write your name" wire:model.live="name" />
             @error('name')
             <span style="color: red;">{{ $message }}</span>
             @enderror
             <textarea type="text" class="w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Write your comment" rows="5" cols="33" wire:model.live="comment"></textarea>
             @error('comment')
             <span style="color: red;">{{ $message }}</span>
             @enderror
             <input type="submit" value="Submit comment" class=" text-white px-4 py-3 bg-blue-500  rounded-lg">
         </form>
     </div>
  </div>


      <!--comments-->
      
<div class="max-w-4xl px-10 py-16 mx-auto bg-gray-100  bg-white min-w-screen animation-fade animation-delay  px-0 px-8 mx-auto sm:px-12 xl:px-5">
      
      <p class="mt-1 text-2xl font-bold text-left text-gray-800 sm:mx-6 sm:text-2xl md:text-3xl lg:text-4xl sm:text-center sm:mx-0">
          All comments on this post
      </p>
      <!--comment 1-->
      @foreach ($commentsblog as $commentsall)
      <div class="flex  items-center w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">

          {{-- <a href="#" class="flex items-center mt-6 mb-6 mr-6"><img src="https://avatars.githubusercontent.com/u/71964085?v=4" alt="avatar" class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block">
          </a> --}}

          <div><h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl">By {{ $commentsall->name }}</h3>
              <p class="text-sm font-bold text-gray-300">{{ $commentsall->created_at->format(date('d-m-Y')) }}</p>
              <p class="mt-2 text-base text-gray-600 sm:text-lg md:text-normal">
                {{ $commentsall->comment }}
             </p>
          </div>
          
      </div>
      @endforeach

  </div>
</div>
</div>
</div>

</div>
