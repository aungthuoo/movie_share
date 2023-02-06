<template>
  <div>
    <Head :title="`${form.title}`" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/movies">Movies</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.title }} 
    </h1>
    <trashed-message v-if="movie.deleted_at" class="mb-6" @restore="restore"> This contact has been deleted. </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.title" :error="form.errors.title" class="pb-8 pr-6 w-full" label="Title" />
          <text-input v-model="form.summary" :error="form.errors.summary" class="pb-8 pr-6 w-full" label="Summary" />
          <!--
          <select-input v-model="form.organization_id" :error="form.errors.organization_id" class="pb-8 pr-6 w-full lg:w-1/2" label="Organization">
            <option :value="null" />
            <option v-for="organization in organizations" :key="organization.id" :value="organization.id">{{ organization.name }}</option>
          </select-input>
          -->
          <text-input v-model="form.author" :error="form.errors.author" class="pb-8 pr-6 w-full lg:w-1/2" label="Author" />
          
          <text-input v-model="form.cover_image" :error="form.errors.cover_image" class="pb-8 pr-6 w-full lg:w-1/2" label="cover_image" />
         
          <text-input v-model="form.pdf_download_link" :error="form.errors.pdf_download_link" class="pb-8 pr-6 w-full lg:w-1/2" label="Pdf download link" />
          <text-input v-model="form.tags" :error="form.errors.tags" class="pb-8 pr-6 w-full lg:w-1/2" label="tags" />
          <text-input v-model="form.imdb_ratings" :error="form.errors.imdb_ratings" class="pb-8 pr-6 w-full lg:w-1/2" label="imdb_ratings" />
          <select-input v-model="form.genres" :error="form.errors.genres" class="pb-8 pr-6 w-full lg:w-1/2" label="Genres">
            <option :value="null" />
            <option value="action">Action </option>
            <option value="drama">Drama</option>
          </select-input>
         
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!movie.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Movie</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Movie</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    movie: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: this.movie.title,
        summary: this.movie.summary,
        cover_image: this.movie.cover_image,
        genres: this.movie.genres,
        author: this.movie.author,
        tags: this.movie.tags,
        imdb_ratings: this.movie.imdb_ratings,
        pdf_download_link: this.movie.pdf_download_link
      }),
    }
  },
  methods: {
    update() {
      this.form.put(`/movies/${this.movie.id}`)
    },
    destroy() {
      if (confirm('Are you sure you want to delete this movie?')) {
        this.$inertia.delete(`/movies/${this.movie.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this movie?')) {
        this.$inertia.put(`/movies/${this.movie.id}/restore`)
      }
    },
  },
}
</script>
