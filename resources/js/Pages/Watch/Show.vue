<template>
<section class="bg-black py-12 sm:py-16"> 
  <div class="container mx-auto px-4">
    <nav class="flex">
      <ol role="list" class="flex items-center">
        <li class="text-left">
          <div class="-m-1">
            <a href="/" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Home </a>
          </div>
        </li>

        <li class="text-left">
          <div class="flex items-center">
            <span class="mx-2 text-gray-400">/</span>
            <div class="-m-1">
              <a href="/" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Movies </a>
            </div>
          </div>
        </li>

        <li class="text-left">
          <div class="flex items-center">
            <span class="mx-2 text-gray-400">/</span>
            <div class="-m-1">
              <a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800" aria-current="page"> {{ movie.title }} </a>
            </div>
          </div>
        </li>
      </ol>
    </nav>

    <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
      <div class="lg:col-span-3 lg:row-end-1">
        <div class="lg:flex lg:items-start">
          <div class="lg:order-2 lg:ml-5">
            <div class="max-w-xl overflow-hidden rounded-lg">
              <img class="h-full w-full max-w-full object-cover" :src="movie.cover_image" :alt="movie.title" />
            </div>
          </div>
        </div>
      </div>
        
      <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
        <h1 class="sm: text-2xl font-bold sm:text-3xl text-white">{{ movie.title }}</h1>

        <div class="mt-5 flex items-center">
          <div class="flex items-center">
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
          </div>
          <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
        </div>

        <h2 class="mt-8 text-base text-white">Genres</h2>
        <div class="mt-3 flex select-none flex-wrap items-center gap-1">
          <label class="">
            <input type="radio" name="type" value="Powder" class="peer sr-only" checked />
            <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">{{ movie.genres }}</p>
          </label>
          
         
        </div>


        <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
          <div class="flex items-end">
            <h1 class="text-3xl font-bold text-white">Ks 199</h1>
            <span class="text-base">/month</span>
          </div>

          

          <button @click="makeDownload()" type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-center font-medium block text-white">
            
            Download
              </button>
        </div>

        <ul class="mt-8 space-y-2">
          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
            </svg>
            Free / subscription
          </li>

          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
            </svg>
            Choose payment methods
          </li>
        </ul>
      </div>

      <div class="lg:col-span-3">
        <div class="border-b border-gray-300">
          <nav class="flex gap-4">
            <a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

            <a href="#" title="" class="inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600">
              Reviews
              <span class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100"> 1,209 </span>
            </a>
          </nav>
        </div>

        <div class="mt-8 flow-root sm:mt-12">
          <h1 class="text-3xl font-bold text-white">Summary</h1>
          <p class="mt-4 text-white">{{ movie.summary }}</p>





          <hr/>

          <section class="mt-9">
              <div class="flex items-center justify-between">
                  <span class="font-semibold text-gray-700 text-base dark:text-white">Related Movies </span>
                  <div class="flex items-center space-x-2 fill-gray-500">
                      <svg class="h-7 w-7 rounded-full border p-1 hover:border-red-600 hover:fill-red-600 dark:fill-white dark:hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path d="M13.293 6.293L7.58 12l5.7 5.7 1.41-1.42 -4.3-4.3 4.29-4.293Z"></path>
                      </svg>
                      <svg class="h-7 w-7 rounded-full border p-1 hover:border-red-600 hover:fill-red-600 dark:fill-white dark:hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path d="M10.7 17.707l5.7-5.71 -5.71-5.707L9.27 7.7l4.29 4.293 -4.3 4.29Z"></path>
                      </svg>
                  </div>
              </div>
          
              <div class="mt-4 grid grid-cols-2  sm:grid-cols-4 gap-x-5 gap-y-5">
                  <div v-for="relatedMovie in related_movies" v-bind:key="relatedMovie.id"  class="relative rounded-xl overflow-hidden">
                      <img :src="relatedMovie.cover_image" class="object-cover h-full w-full -z-10" alt="">
                      <div class="absolute top-0 h-full w-full bg-gradient-to-t from-black/50 p-3 flex flex-col justify-between">
                        
                          <a href="#" class="p-2.5 bg-gray-800/80 bg-white rounded-lg text-black self-end hover:bg-red-600/80">
                              {{ relatedMovie.imdb_ratings  }}
                          </a>
                          
                          <div class="self-center flex flex-col items-center space-y-2">
                              <span class="capitalize text-white font-medium drop-shadow-md">{{ relatedMovie.title }}</span>
                              <span class="text-gray-100 text-xs">+12 Movies</span>

                          </div>
                      </div>
                  </div>
                  
              </div>
          </section>



          

          <hr/>
          <div class="max-w-2xl mx-auto mt-12 px-4">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-lg lg:text-2xl font-bold text-white dark:text-white">Discussion (20)</h2>
          </div>




          <form @submit.prevent="store" class="mb-6">
              <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                  <label for="comment" class="sr-only">Your comment</label>
                  <textarea id="comment" v-model="form.comments" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." ></textarea>
              </div>
              <button v-if="is_auth" type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-center font-medium block text-white">
                  Post comment
              </button>

              <a v-else href="/login" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-center font-medium block text-white">Login & comment </a>
          </form>
         
          <article v-for="comment in comments" v-bind:key="comment.id"  
              class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
              <footer class="flex justify-between items-center mb-2">
            
                  <div v-if="comment.user" class="flex items-center">
                      <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-4.jpg" alt="Helene Engels">{{ comment.user.name }}</p>
                      <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate="" datetime="2022-06-23" title="June 23rd, 2022">{{ comment.created_at }}</time></p>
                  </div>
                  <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                          </path>
                      </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdownComment4" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(918px, 1012.5px, 0px);">
                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                          <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                          </li>
                          <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                          </li>
                          <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                          </li>
                      </ul>
                  </div>
              </footer>
              <p class="text-gray-500 dark:text-gray-400">{{ comment.comments }}</p>
              <div class="flex items-center mt-4 space-x-4">
                  <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                      <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                      Reply
                  </button>
              </div>
          </article>
        </div>



        
      </div>
    </div>
  </div>
</div>
</section>

</template>



<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'
import { isIntegerKey } from '@vue/shared'

export default {
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  props: {
    is_auth : Boolean, 
    movie: Object, 
    related_movies: Array,
    comments : Array 
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        user_id : 0, 
        movie_id: this.movie.id,
        comments: ""
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/comments'); 
      this.clearForm(); 
    },
    clearForm(){
      debugger; 
        this.form.user_id  = 0, 
        this.form.movie_id = this.movie.id,
        this.form.comments = ""
    },
    update() {
      this.form.put(`/movies/${this.movie.id}`)
    },
    makeDownload(){
      alert('Downloading ... '); 
    }
  },
}
</script>

