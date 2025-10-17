    <template>

  <div class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 flex items-center justify-center p-4">

  <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-6 sm:p-8">
    <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Login</h2>
    <form @submit.prevent="Login" action="/register" method="POST" class="space-y-5">



      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email </label>
        <input  v-model="email" type="email" id="email" name="email" required placeholder="email"
          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
      </div>


      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input  v-model="password" type="password" id="password" name="password" required placeholder=".........."
          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
      </div>


      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md transition-all duration-200">
        Login
      </button>

      <p class="text-center text-sm text-gray-600 mt-4">
       You don't have an account?
        <a href="/register" class="text-blue-600 font-medium hover:underline">Register</a>
      </p>
    </form>
  </div>
  </div>

</template>
<script>

</script>
