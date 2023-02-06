<template>
  <div>
    <Head title="Movies" />
    <h1 class="mb-8 text-3xl font-bold">Movies</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/movies/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Contact</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Title</th>
          <th class="pb-4 pt-6 px-6">Author</th>
          <th class="pb-4 pt-6 px-6">Imdb ratings</th>
          <th class="pb-4 pt-6 px-6" colspan="2">Ctrl</th>
        </tr>
        <tr v-for="movie in movies.data" :key="movie.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/movies/${movie.id}/edit`">
              {{ movie.title }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/movies/${movie.id}/edit`" tabindex="-1">
              <div v-if="movie.author">
                {{ movie.author }}
              </div>
            </Link>
          </td>
          
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/movies/${movie.id}/edit`" tabindex="-1">
              {{ movie.imdb_ratings }}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/movies/${movie.id}/edit`" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="movies.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No movies found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="movies.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    movies: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/movies', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
