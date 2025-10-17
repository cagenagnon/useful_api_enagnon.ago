<script setup lang="ts">
</script>
<template>

  <div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
      <div class="p-6 font-bold text-black text-2xl">Modules</div>
      <nav class="mt-8">
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100"></a>
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100"></a>
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100"></a>
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100"></a>
      </nav>
    </aside>

    <div class="flex-1 flex flex-col">
      <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-black">Dashboard</h1>
        <div class="flex items-center gap-4">
          <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-lg">
          <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">SR
          </div>
        </div>
      </header>
    </div>

  </div>


</template>
