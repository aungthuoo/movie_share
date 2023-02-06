<template>
  <div>
    <Head title="Create Contact" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/movies">Movies</Link>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.title" :error="form.errors.title" class="pb-8 pr-6 w-full" label="Title" />
          <text-input v-model="form.summary" :error="form.errors.summary" class="pb-8 pr-6 w-full" label="Summary" />
          <text-input v-model="form.cover_image" :error="form.errors.cover_image" class="pb-8 pr-6 w-full lg:w-1/2" label="cover_image" />
         
          <text-input v-model="form.pdf_download_link" :error="form.errors.pdf_download_link" class="pb-8 pr-6 w-full lg:w-1/2" label="Pdf download link" />

          <text-input v-model="form.author" :error="form.errors.author" class="pb-8 pr-6 w-full lg:w-1/2" label="Author" />
          <text-input v-model="form.tags" :error="form.errors.tags" class="pb-8 pr-6 w-full lg:w-1/2" label="Tags" />
          <text-input v-model="form.imdb_ratings" :error="form.errors.imdb_ratings" class="pb-8 pr-6 w-full lg:w-1/2" label="imdb_ratings" />
          <select-input v-model="form.genres" :error="form.errors.genres" class="pb-8 pr-6 w-full lg:w-1/2" label="Genres">
            <option :value="null" />
            <option value="action">Action </option>
            <option value="drama">Drama</option>
          </select-input>
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Movie</loading-button>
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

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
  },
  layout: Layout,
  props: {
    organizations: Array,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: "",
        summary: "",
        cover_image: "",
        genres: "",
        author: "",
        tags: "",
        imdb_ratings: "",
        pdf_download_link: ""
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/movies')
    },
  },
}
</script>
