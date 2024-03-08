<template >
  <div class=" fixed top-8 z-50 left-38 w-[100%]  fixed  bg-gradient-to-r from-pink-600 to-pink-700 pr-[165px] ">
  <!--contenair-->
  <div class="flex justify-between items-center py-4 px-8  left-0 top-0">

    <!-- nom plugin-->
    <a href="#" class="text-white text-base font-bold hover:text-blue-100 cursor-pointer">Belfolio</a>

    <!-- Nav -->
    <div class="flex flex-1 justify-center gap-6">
      <a href="#" class="text-white text-base font-bold hover:text-yellow-200 cursor-pointer underline-on-hover">Accueil</a>
      <router-link to="/categorie" class="text-white text-base font-bold hover:text-yellow-200 cursor-pointer underline-on-hover">Catégorie</router-link>
      <router-link to="/Doc" class="text-white text-base font-bold hover:text-yellow-200 cursor-pointer underline-on-hover">Doc</router-link>
    </div>
    <!-- outils -->
     <div class="flex justify-end items-center justify-between gap-4">
       <!-- Barre de recherche -->
       <div class="relative flex items-center flex-1 mr-6 w-90">
          <input type="text" placeholder="Rechercher... " class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 flex-1">
       </div>
       <!-- notification -->
       <div class="w-4 h-4 bg-blue-50 bg-opacity-0 rounded-lg"> 
         <a href="#" class="w-4 h-4 bg-white-50 bg-opacity-0 rounded-lg inline-block hover:bg-gray cursor-pointer   ">
           <svg fill="#fff" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
              <path id="svgPath" d="M23.313 26.102l-6.296-3.488c2.34-1.841 2.976-5.459 2.976-7.488v-4.223c0-2.796-3.715-5.91-7.447-5.91-3.73 0-7.544 3.114-7.544 5.91v4.223c0 1.845 0.78 5.576 3.144 7.472l-6.458 3.503s-1.688 0.752-1.688 1.689v2.534c0 0.933 0.757 1.689 1.688 1.689h21.625c0.931 0 1.688-0.757 1.688-1.689v-2.534c0-0.994-1.689-1.689-1.689-1.689zM23.001 30.015h-21.001v-1.788c0.143-0.105 0.344-0.226 0.502-0.298 0.047-0.021 0.094-0.044 0.139-0.070l6.459-3.503c0.589-0.32 0.979-0.912 1.039-1.579s-0.219-1.32-0.741-1.739c-1.677-1.345-2.396-4.322-2.396-5.911v-4.223c0-1.437 2.708-3.91 5.544-3.91 2.889 0 5.447 2.44 5.447 3.91v4.223c0 1.566-0.486 4.557-2.212 5.915-0.528 0.416-0.813 1.070-0.757 1.739s0.446 1.267 1.035 1.589l6.296 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.809zM30.312 21.123l-6.39-3.488c2.34-1.841 3.070-5.459 3.070-7.488v-4.223c0-2.796-3.808-5.941-7.54-5.941-2.425 0-4.904 1.319-6.347 3.007 0.823 0.051 1.73 0.052 2.514 0.302 1.054-0.821 2.386-1.308 3.833-1.308 2.889 0 5.54 2.47 5.54 3.941v4.223c0 1.566-0.58 4.557-2.305 5.915-0.529 0.416-0.813 1.070-0.757 1.739 0.056 0.67 0.445 1.267 1.035 1.589l6.39 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.779h-4.037c0.61 0.46 0.794 1.118 1.031 2h3.319c0.931 0 1.688-0.757 1.688-1.689v-2.503c-0.001-0.995-1.689-1.691-1.689-1.691z"></path>
           </svg>
         </a>
       </div>
        <!-- user -->
       <div class="w-4 h-4 bg-blue-50 bg-opacity-0 rounded-lg"> 
         <a href="#" class="w-4 h-4 bg-white-50 bg-opacity-0 rounded-lg inline-block hover:bg-gray transition duration-300 ease-in-out">
           <svg fill="#fff" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
              <path id="svgPath" d="M23.313 26.102l-6.296-3.488c2.34-1.841 2.976-5.459 2.976-7.488v-4.223c0-2.796-3.715-5.91-7.447-5.91-3.73 0-7.544 3.114-7.544 5.91v4.223c0 1.845 0.78 5.576 3.144 7.472l-6.458 3.503s-1.688 0.752-1.688 1.689v2.534c0 0.933 0.757 1.689 1.688 1.689h21.625c0.931 0 1.688-0.757 1.688-1.689v-2.534c0-0.994-1.689-1.689-1.689-1.689zM23.001 30.015h-21.001v-1.788c0.143-0.105 0.344-0.226 0.502-0.298 0.047-0.021 0.094-0.044 0.139-0.070l6.459-3.503c0.589-0.32 0.979-0.912 1.039-1.579s-0.219-1.32-0.741-1.739c-1.677-1.345-2.396-4.322-2.396-5.911v-4.223c0-1.437 2.708-3.91 5.544-3.91 2.889 0 5.447 2.44 5.447 3.91v4.223c0 1.566-0.486 4.557-2.212 5.915-0.528 0.416-0.813 1.070-0.757 1.739s0.446 1.267 1.035 1.589l6.296 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.809zM30.312 21.123l-6.39-3.488c2.34-1.841 3.070-5.459 3.070-7.488v-4.223c0-2.796-3.808-5.941-7.54-5.941-2.425 0-4.904 1.319-6.347 3.007 0.823 0.051 1.73 0.052 2.514 0.302 1.054-0.821 2.386-1.308 3.833-1.308 2.889 0 5.54 2.47 5.54 3.941v4.223c0 1.566-0.58 4.557-2.305 5.915-0.529 0.416-0.813 1.070-0.757 1.739 0.056 0.67 0.445 1.267 1.035 1.589l6.39 3.488c0.055 0.030 0.126 0.063 0.184 0.089 0.148 0.063 0.329 0.167 0.462 0.259v1.779h-4.037c0.61 0.46 0.794 1.118 1.031 2h3.319c0.931 0 1.688-0.757 1.688-1.689v-2.503c-0.001-0.995-1.689-1.691-1.689-1.691z"></path>
           </svg>
         </a>
       </div>
     </div>

</div>
</div>
</template>
<script>


</script>
<style >
    .underline-on-hover
     {
      position: relative;
      display: inline-block;
     }

  .underline-on-hover::after 
    {
      content: '';
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 100%;
      height: 1px;
      background-color: transparent;
      transition: background-color 0.3s ease;
     }

  .underline-on-hover:hover::after 
    {
      background-color: white; /* Couleur de soulignement au survol */
    }

</style>