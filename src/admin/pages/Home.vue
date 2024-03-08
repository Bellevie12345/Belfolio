<template class="" >

    <div class=" flex " v-if="Show_Home">
   <!--Aceuil-->
   <div class="mx-auto pt-[110px] pl-[80px] ">
    <div class="w-[1280px] h-[353px] bg-slate-200 rounded-lg shadow border border-zinc-400 flex justify-center mx-auto">
      <!-- Première colonne -->
      <div class="flex-1 w-[50%] pt-[60px] justify-center items-center">
        <div class="w-[582px] h-[170px] flex-col justify-start items-start inline-flex ">
          <div class="mx-auto pb-[4px]">
            <span class="text-black text-[38px] font-medium font-Montserrat leading-[60.32px]">Générer vos Portfolio avec <br/></span>
            <span class="text-black text-[38px] font-bold font-Montserrat leading-[60.32px]">Belfolio</span>
          </div>
          <div class="w-[582px] h-[170px] ml-[65px] pb-[20px]">
            <span class="text-black text-sm font-normal font-Montserrat leading-[22.96px]">La conception et l'intégration de votre  </span>
            <span class="text-black text-sm font-semibold font-Montserrat leading-[22.96px]">portfolio </span>
            <span class="text-black text-sm font-normal font-Montserrat leading-[22.96px]">en un clic.</span>
          </div> 
          <div class="flex justify-center items-center w-[325px] h-[51px] px-[70px] py-3.5 bg-pink-500 rounded-[5px] shadow border border-zinc-100 mx-auto">
            <button @click="form1" class="text-slate-200 text-sm font-semibold font-Montserrat leading-[22.96px] hover:text-yellow-200 cursor-pointer underline-on-hover">
              Créer un nouveau portfolio
            </button>
         </div>
    
        </div>
      </div>
      <!-- Deuxième colonne -->
      <div class="flex justify-center items-center">
      <div class="flex-1 bg-blue-200">
        <div class="w-[427px] h-[345px] relative mx-[50px]">
          <img class=" w-[227px] h-[153px] left-0 top-[192px] absolute shadow" src="https://via.placeholder.com/227x153" />
          <img class=" w-[229px] h-[168px] left-0 top-0 absolute shadow" src="https://via.placeholder.com/229x168" />
          <img class=" w-[184px] h-[294px] left-[243px] top-[21px] absolute shadow" src="https://via.placeholder.com/184x294" />
        </div>
      </div>
    </div>
    
    
  </div>
  <div class="w-[98px] h-6 px-2.5 justify-center items-end gap-[3px] inline-flex mt-[20px]">
    <div class="text-black text-base font-bold font-['Red Hat Text'] leading-normal">Design</div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="ml-1">
      <path fill="gray" d="M8 5v14l11-7z"/>
    </svg>
  </div>
  
  
   <!-- templtate design -->
  <div class="bg-gray-100 ">
    <div class="box-border grid grid-cols-3 gap-3">
      <!-- Column -->
      <div v-for="information in informations" :key="information.ID" class="bg-white p-10 rounded-lg shadow-lg">
        <div class="mb-[10px] flex flex-row items-center justify-between">
          <!-- TITLE -->
          <div class="flex items-center">
            <img v-if="information.formulaire" :src="information.formulaire.photo" alt="Logo" class="w-[100px] h-[100px] rounded-full mr-4">
            <span class="text-[20px] text-black font-bold">{{ information.post_title }}</span>
          </div>
          
          <!-- ICON -->
          <div class="flex flex-row items-center space-x-4">
            <!-- Edit -->
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 hover:cursor-pointer hover:opacity-70" @click="edit_Form1(information.ID)">
              <path d="M12 20H20.5M18 10L21 7L17 3L14 6M18 10L8 20H4V16L14 6M18 10L14 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <!-- Trash -->
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 hover:cursor-pointer hover:opacity-70" @click="()=> delFolio(information.ID)">
              <path d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z" fill="#f34564"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12404C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001ZM10.2463 12.1886C10.2051 11.7548 9.83753 11.4382 9.42537 11.4816C9.01321 11.525 8.71251 11.9119 8.75372 12.3457L9.25372 17.6089C9.29494 18.0427 9.66247 18.3593 10.0746 18.3159C10.4868 18.2725 10.7875 17.8856 10.7463 17.4518L10.2463 12.1886ZM14.5746 11.4816C14.9868 11.525 15.2875 11.9119 15.2463 12.3457L14.7463 17.6089C14.7051 18.0427 14.3375 18.3593 13.9254 18.3159C13.5132 18.2725 13.2125 17.8856 13.2537 17.4518L13.7537 12.1886C13.7949 11.7548 14.1625 11.4382 14.5746 11.4816Z" fill="#f34564"/>
            </svg>
          </div>
        </div>
        <img src="https://via.placeholder.com/300" alt="Image 1" class="w-full h-auto rounded-lg">
      </div>
    </div>
  </div>
  
  </div>
  </div>

  <!-- FORMULAIRE -->

       <!-- Formulaire 1 -->
<div  class="mx-auto pt-[110px] pl-[220px] ">
    <!-- Début du formulaire -->
    <form @submit.prevent="FolioId!=0 ? update_Folio() : addFolio()">
  <div v-if="show_Form1" class="w-[1265px] h-[775px] relative">
    <!-- Entête du formulaire -->
    <div class="w-[1265px] h-[76px] pl-[30px] pt-[20px] left-0 top-0 absolute bg-white">
      <div class="text-black text-[22px] font-bold font-['Red Hat Text'] leading-[33px]">Formulaire d’ajout d’information</div>
    </div>
    
      <!-- Corps du formulaire -->
      <div class="w-[1265px] h-[617px] left-0 top-[88px] absolute bg-white">
        <!-- Section Informations personnelles -->
        <div class="w-[1265px] h-[76px] pl-[30px] pt-[20px] left-0 top-0 absolute bg-white">
          <div class="text-black text-base font-bold font-['Red Hat Text'] leading-normal">1- Informations personnels</div>
        </div>
        <!-- Champs du formulaire -->
        <div class="w-[1210px] h-[493px] left-[19px] top-[100px] absolute">
          <!-- Ligne 1 -->
          <div class="w-[1210px] h-[73px] left-0 top-0 absolute">
            <!-- Titre pour le portfolio -->
            <div class="w-[570px] h-[73px] left-0 top-0 absolute">
              <label class="left-0 top-0 absolute text-neutral-800 text-sm font-semibold font-['Red Hat Text']">Titre pour votre portfolio</label>
              <input v-model="info.title" type="text" id="nom" name="titre_portolio" placeholder="Entrez votre titre " required class="w-[570px] h-[45px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
            </div>
            <!-- Nom -->
            <div class="w-[595px] h-[73px] left-[615px] top-0 absolute">
              <label class="left-0 top-0 absolute text-neutral-700 text-xs font-medium font-['Montserrat'] leading-[19px]">Votre identité</label>
              <input v-model="info.identifier" type="text" id="nom" name="titre_portolio" placeholder="Entrez votre noms et prenoms" required class="w-[595px] h-[45px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
            </div>
          </div>
          <!-- Ligne 2 -->
          <div class="w-[1210px] h-[74px] left-0 top-[112px] absolute">
            <!-- Photo -->
            <div class="w-[570px] h-[73px] left-0 top-0 absolute">
              <!-- Libellé "Votre Photo" -->
              <label for="photo" class="left-0 top-0 absolute text-neutral-700 text-xs font-medium font-['Montserrat'] leading-[19px]">Votre Photo</label>
              <!-- Div pour afficher le titre de l'image -->
              <input type="text" readonly v-model="info.photo" id="titre" class="w-[570px] h-[45px] pl-[8px] flex items-center text-blue-900 left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
              <!-- Bouton pour ajouter une image -->
              <div class="w-[50px] h-[45px] left-[520px] top-[28px] absolute bg-pink-600 bg-opacity-10 rounded-tr-[5px] rounded-br-[5px] border border-neutral-600">
                <button for="titre" @click="addImage">
                  <!-- Icône SVG -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-0 top-0 m-[10px] text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- Ligne pour sélectionner une image -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg>
                </button>
              </div>
            </div>
            <!-- Profession -->
            <div class="w-[595px] h-[73px] left-[615px] top-0 absolute">
              <label class="left-0 top-0 absolute text-neutral-700 text-xs font-medium font-['Montserrat'] leading-[19px]">Domaine d'expertisme</label>
              <input v-model="info.profession" type="text" id="profession" name="profession" placeholder="Entrer ce domaine" required class="w-[595px] h-[45px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
            </div>
          </div>
          <!-- Ligne 3 -->
          <div class="w-[1210px] h-[73px] top-[220px] absolute">
            <label class="left-0 top-0 absolute text-neutral-800 text-sm font-semibold font-['Red Hat Text']">Vos réalisations</label>
            <input type="text" readonly id="titre2" v-model="info.realization" class="w-[1210px] h-[45px] left-0 top-[28px] pl-[8px] flex items-center text-blue-900 left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
            <div class="w-[50px] h-[45px] left-[1160px] top-[28px] absolute bg-pink-600 bg-opacity-10 rounded-tr-[5px] rounded-br-[5px] border border-neutral-600">
              <button for="titre2" @click="addImage2">
                <!-- Icône SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-0 top-0 m-[10px] text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <!-- Ligne pour sélectionner une image -->
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
              </button>
            </div>
          </div>
          <!-- Ligne 4 -->
          <div class="w-[570px] h-[163px] left-0 top-[330px] absolute">
            <label class="Description left-0 top-0 absolute text-neutral-800 text-sm font-semibold font-['Red Hat Text']">Description</label>
            <textarea v-model="info.description" id="commentaires" name="commentaires" rows="4" cols="50" placeholder="Parlez nous un peu de vous " class="Rectangle2661 w-[570px] h-[135px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600"></textarea><br><br>
            <div></div>
          </div>
          <!-- Ajouter des profils secondaires -->
          <!-- <div class="InputTitle w-[596px] h-[72px] left-[614px] top-[330px] absolute">
            <label for="profession" class="AjouterLesLiensDuMenu absolute left-0 top-0 text-neutral-800 text-sm font-semibold">Ajouter des profils secondaires</label>
            <input type="text" id="profession" name="profession" placeholder="Nom du profil" required  class="w-[596px] h-12 left-0 top-7 absolute bg-white rounded-lg border border-neutral-600" @keydown.enter.prevent="addProfile" v-model="newProfileName">
            <div class="ProfileList left-0 top-[80px]  absolute">
              <div v-if="addedProfiles.length === 0" class="text-neutral-500 text-sm bg-bleu-200">Aucun profil ajouté pour le moment.</div>
              <ul v-else class="flex flex-wrap">
                <li v-for="(profile, index) in addedProfiles" :key="index" class="flex items-center bg-blue-100 rounded-lg p-2 mb-2 mr-2 text-blue-900">
                  <span>{{ profile }}</span>
                  <svg @click="removeProfile(index)" class="ml-2 w-5 h-5 text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
      
      <!-- Pied du formulaire -->
      <div class="w-[1265px] h-[59px] left-0 top-[716px] pt-[1px] absolute bg-white">
        <!-- Bouton de sauvegarde et continuer -->
        <div @click="form2" class="w-[325px] h-[59px] px-[70px] py-3.5 left-[942px] absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-start items-start gap-2.5 inline-flex">
          <button class="hover:text-yellow-200 cursor-pointer underline-on-hover">
            <p  class=" text-white text-sm font-semibold font-['Montserrat'] leading-[22.96px]">Sauvegarder et continuer</p>
          </button>
        </div>
        <!-- Bouton Retour -->
        <div  @click="return_Form1" class="w-[200px] h-[59px] px-[70px] py-3.5 absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-start items-start gap-2.5 inline-flex">
          <button class="hover:text-yellow-200 cursor-pointer underline-on-hover">
            <p  class=" text-white text-sm font-semibold font-['Montserrat'] leading-[22.96px]">Retour</p>
          </button>
        </div>
      </div>
  </div>




    <!-- Formulaire2-->
    <div v-if="show_Form2" class="mx-auto pt-[150px]  ">
     <div class=" w-[1265px] h-[775px] relative">  
       <div class="w-[1265px] h-[775px] left-0 top-0 absolute">
  
         <!-- formulaire en-tête-->
          <div class="w-[1265px] h-[76px] pl-[30px] pt-[20px] left-0 top-0 absolute bg-white">
            <div class="text-black text-[22px] font-bold font-['Red Hat Text'] leading-[33px]">Formulaire d’ajout d’information </div>
          </div>
   <!-- formulaire corp-->
   
          <div class=" w-[1265px] h-[700px] left-0 top-[88px]  bg-white">
       <!-- formulaire titre-->
       <div class="w-[1265px] h-[76px] pl-[30px] pt-[20px] left-0 top-0 absolute bg-white">
         <div class="text-black text-base font-bold font-['Red Hat Text'] leading-normal">3-Information professionelles</div>
       </div>

       <div class="w-[1379px] h-[642px] left-[40px] relative">
        <!-- ligne1 -->
          <div class=" w-[1379px] h-[642px]  left-0 top-0 absolute">
            <div class="w-[1210px] h-[73px] top-[90px] absolute">
              <label class="left-0 top-0 absolute text-neutral-800 text-sm font-semibold font-['Red Hat Text']">Compétences</label>
              <input type="text" id="profession" name="profession" placeholder="Vos compétences" required class="w-[1210px] h-[45px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600" @keydown.enter.prevent="addCompétences" v-model="newCompétencesName">
        <div class="ProfileList left-0 top-[80px]  absolute">
          <div v-if="addedCompétences.length === 0" class="text-neutral-500 text-sm bg-bleu-200">Aucune compétence ajouté pour le moment.</div>
             <ul v-else class="flex flex-wrap">
                <li v-for="(Compétences, index) in addedCompétences" :key="index" class="flex items-center bg-blue-100 rounded-lg p-2 mb-2 mr-2 text-blue-900">
                 <span>{{ Compétences }}</span>
                   <svg @click="removeCompétences(index)" class="ml-2 w-5 h-5 text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
               </li>
             </ul>
           </div>
        </div>
     </div>
         <!-- Education -->
         <div class=" w-[596px] h-[73px] top-[230px] absolute">
            <div class="w-[570px] h-[73px] left-0 top-0 absolute">
               <label class="left-0 top-0 absolute text-neutral-700 text-xs font-bold font-['Montserrat'] leading-[19px]">Education</label>
               <input v-model="info.education" type="text" id="photo" name="photo" placeholder="Vos formations " required class="w-[570px] h-[45px] pl-[8px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
               <div class="w-[50px] h-[45px] left-[520px] top-[28px] absolute bg-pink-400 bg-opacity-10 rounded-tr-[5px] rounded-br-[5px] border border-neutral-600"></div>
           <div class=" w-8 h-8 left-[724px] top-[265px] absolute"></div>
           <div class="  top-[100px] absolute">
             <div class=" w-[570px] h-[45px] absolute">
                <input type="text" id="photo" name="photo" placeholder="Intitulé de la formation " required class="Rectangle2663 w-[270px] h-[45px] left-0 top-0 absolute bg-white rounded-[5px] border border-neutral-600">
             </div>
             <div class=" w-[283px] h-[45px] left-[300px]  absolute">
               <input type="text" id="photo" name="photo" placeholder="Ecole/Université " required class="Rectangle2663 w-[270px] h-[45px] top-0 absolute bg-white rounded-[5px] border border-neutral-600">
             </div>
           <div class=" top-[60px] absolute">
              <div class=" w-[570px] h-[45px] absolute">
               <input type="text" id="photo" name="photo" placeholder="type de la formation " required class="Rectangle2663 w-[270px] h-[45px] left-0 top-0 absolute bg-white rounded-[5px] border border-neutral-600">
              </div>
             <div class=" w-[293px] h-[45px] left-[300px]  absolute">
               <input type="text" id="photo" name="photo" placeholder="Durée de la formation ( ex:2020-2024) " required class="Rectangle2663 w-[270px] h-[45px] top-0 absolute bg-white rounded-[5px] border border-neutral-600">
             </div>  
        </div>
        <div class="top-[120px] absolute">
        
          <p  class="w-[130px] h-[47px] px-[70px] absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-center items-center gap-2.5 inline-flex" style="color: rgb(255, 255, 255); font-size: 20px; text-align: center;">
          Ajouter
          </p>
          </div>
       <!-- Importation cv -->
       <div class=" w-[590px] h-[73px] top-[240px] absolute">
    <label class="left-0 top-0 absolute text-neutral-800 text-sm font-semibold font-['Red Hat Text']">Curriculum vitae
      
    </label>
    <input type="text" readonly id="titre2" v-model="info.cv" class="w-[1210px] h-[45px] left-0 top-[28px] pl-[8px] flex items-center text-blue-900  left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
      <!-- {{ fileTitle2.join('  , ')}}
    </section> -->
    <div class="w-[50px] h-[45px] left-[1160px] top-[28px] absolute bg-pink-600 bg-opacity-10 rounded-tr-[5px] rounded-br-[5px] border border-neutral-600">
      <button for="titre2" @click="addImage3"> <!-- Événement de clic pour ajouter une image -->
        <!-- Icône SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-0 top-0 m-[10px] text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <!-- Ligne pour sélectionner une image -->
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
</div>
</div>
  <!-- Expériences-->
       <div class=" w-[596px] h-[73px] absolute left-[600px] top-[230px]">
          <div class="w-[570px] h-[73px] left-0 top-0 absolute">
           <label class="left-0 top-0 absolute text-neutral-700 text-xs font-bold font-['Montserrat'] leading-[19px]">Expériences</label>
           <input v-model="info.experience" type="text" id="photo" name="photo" placeholder="vos expériences" required class="w-[570px] h-[45px] pl-[8px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
           <div class="w-[50px] h-[45px] left-[520px] top-[28px] absolute bg-pink-400 bg-opacity-10 rounded-tr-[5px] rounded-br-[5px] border border-neutral-600"></div>
         </div>
       <div class="Group19352945 left- top-[100px] absolute">
             <div class="Group19352945 w-[570px] h-[45px] absolute">
                <input type="text" id="photo" name="photo" placeholder="Nom de l'entreprise " required class="Rectangle2663 w-[270px] h-[45px] left-0 top-0 absolute bg-white rounded-[5px] border border-neutral-600">
             </div>
             <div class="Group19352946 w-[283px] h-[45px] left-[300px]  absolute">
               <input type="text" id="photo" name="photo" placeholder="Poste " required class="Rectangle2663 w-[270px] h-[45px] top-0 absolute bg-white rounded-[5px] border border-neutral-600">
             </div>
           <div class="Group19352945  top-[60px] absolute">
              <div class="Group19352945 w-[570px] h-[45px] absolute">
               <input type="text" id="photo" name="photo" placeholder="Adresse " required class="Rectangle2663 w-[270px] h-[45px] left-0 top-0 absolute bg-white rounded-[5px] border border-neutral-600">
              </div>
             <div class="Group19352946 w-[293px] h-[45px] left-[300px]  absolute">
               <input type="text" id="photo" name="photo" placeholder="Durée (début-fin) " required class="Rectangle2663 w-[270px] h-[45px] top-0 absolute bg-white rounded-[5px] border border-neutral-600">
             </div>
        </div>
        <div class="button top-[120px] absolute">
    <P   class="w-[130px] h-[47px] px-[70px] absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-center items-center gap-2.5 inline-flex" style="color: rgb(255, 255, 255); font-size: 20px; text-align: center;">
     Ajouter
    </p>
</div>
</div>
</div>
</div>
   <!-- formulaire pied-->
   <div class=" w-[1265px] h-[59px] left-0 top-[716px] pt-[1px] absolute bg-white">
     <div class=" w-[325px] h-[59px] px-[70px] py-3.5 left-[942px]  absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-start items-start gap-2.5 inline-flex">
        <button @click="form3" class=" hover:text-yellow-200 cursor-pointer underline-on-hover">
          <p  class=" text-white text-sm font-semibold font-['Montserrat'] leading-[22.96px]">Sauvegarder et continuer</p>
        </button>
    </div>
    <div   @click="Return_Form2" class=" w-[200px] h-[59px] px-[70px] py-3.5   absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-start items-start gap-2.5 inline-flex">
        <button class=" hover:text-yellow-200 cursor-pointer underline-on-hover">
          <p  class=" text-white text-sm font-semibold font-['Montserrat'] leading-[22.96px]">Retour</p>
        </button>
    </div>
  </div>
    </div>  
</div>
  </div>
  </div>


  <!-- Formulaire3 -->
  <div v-if="show_Form3" class="mx-auto pt-[110px]  ">
     <div class=" w-[1265px] h-[775px] relative">  
       <div class="w-[1265px] h-[775px] left-0 top-0 absolute">
  
         <!-- formulaire en-tête-->
          <div class="w-[1265px] h-[76px] pl-[30px] pt-[20px] left-0 top-0 absolute bg-white">
            <div class="text-black text-[22px] font-bold font-['Red Hat Text'] leading-[33px]">Formulaire d’ajout d’information </div>
          </div>
   <!-- formulaire corp-->
    <div class=" w-[1265px] h-[617px] left-0 top-[88px] absolute bg-white">
      <div>
       <!-- formulaire titre-->
       <div class="w-[1265px] h-[76px] pl-[30px] pt-[20px] left-0 top-0 absolute bg-white">
         <div class="text-black text-base font-bold font-['Red Hat Text'] leading-normal">3-Contact et reseaux sociaux</div>
       </div>
       <div class=" w-[1210px] h-[493px] left-[19px] top-[100px] absolute">
        <!-- ligne1-->
      <div class=" w-[1210px] h-[73px] left-0 top-0 absolute">
          <!-- titre portofolio-->
        <div class=" w-[570px] h-[73px] left-0 top-0 absolute">
          <div class=" left-0 top-0 absolute text-neutral-800 text-sm font-semibold font-['Red Hat Text']">Contact</div>
          <input v-model="info.contact" type="text" id="contact" name="contact" placeholder="(code) numero " required class=" w-[570px] h-[45px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
        </div>
        <!-- nom-->
        <div class=" w-[595px] h-[73px] left-[615px] top-0 absolute">
          <div class=" left-0 top-0 absolute text-neutral-700 text-xs font-medium font-['Montserrat'] leading-[19px]">Adresse</div>
          <input v-model="info.adress" type="text" id="nom" name="titre_portolio" placeholder="pays-ville" required class="w-[595px] h-[45px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
        </div>
      </div>
      <!-- ligne2-->
      <div class=" w-[1210px] h-[74px] left-0 top-[112px] absolute">
         <!-- photo-->
         <div class="relative">
    <div class="InputTitle w-[570px] left-0 top-0 absolute">
      <label for="socialLink" class="text-neutral-700 text-xs font-medium font-['Montserrat'] leading-[19px]">Liens réseaux sociaux</label>
      <input type="text" id="socialLink" name="socialLink" placeholder="Nom du profil"  required class="w-[570px] h-[45px] left-0 top-[28px] absolute bg-white rounded-lg border border-neutral-600" v-model="newProfileName" @keyup.enter="addProfile">
      <div class="ProfileList left-0 top-[80px] absolute">
        <div v-if="addedProfiles.length === 0" class="text-neutral-500 text-sm bg-blue-200" ref="noLinksText">Aucun lien ajouté pour le moment.</div>
        <ul class="flex flex-wrap">
          <li v-for="(profile, index) in addedProfiles" :key="index" class="flex items-center bg-blue-100 rounded-lg p-2 mb-2 mr-2 text-blue-900">
            <span>{{ profile }}</span>
            <svg @click="removeProfile(index)" class="ml-2 w-5 h-5 text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </li>
        </ul>
      </div>
      <!-- Bouton pour ouvrir le popup -->
      <div class="w-[50px] h-[45px] left-[520px] top-[28px] absolute bg-pink-600 bg-opacity-10 rounded-tr-[5px] rounded-br-[5px] border border-neutral-600">
        <button @click="isPopupOpen = true">
          <!-- Icône SVG -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute right-0 top-0 m-[10px] text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <!-- Ligne pour sélectionner une compétence -->
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
        </button>
      </div>
    </div>
    <!-- Popup -->
    <div v-if="isPopupOpen" class="absolute bottom-[28px] bg-white p-8 rounded-lg border border-gray-300" ref="popup">
      <h2 class="text-lg font-semibold mb-4">Choisissez une catégorie :</h2>
      <div class="flex justify-between">
        <button @click="selectedCategory = 'Facebook'; " class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mr-2">Facebook</button>
        <button @click="selectedCategory = 'LinkedIn'; " class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mr-2">LinkedIn</button>
        <button @click="selectedCategory = 'Twitter'; " class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Twitter</button>
      </div>
    </div>
  </div>
        <!-- profession-->
        <div class=" w-[595px] h-[73px] left-[615px] top-[1px] absolute">
          <div class="left-0 top-0 absolute text-neutral-700 text-xs font-medium font-['Montserrat'] leading-[19px]">Mail</div>
          <input v-model="info.email" type="text" id="photo" name="photo" placeholder="" required class="w-[570px] h-[45px] pl-[8px] left-0 top-[28px] absolute bg-white rounded-[5px] border border-neutral-600">
         </div>
      </div>
      </div>
    </div>

   <!-- formulaire pied-->
   <div class=" w-[1265px] h-[59px] left-0 top-[650px] pt-[1px] absolute bg-white">
     <div class=" w-[325px] h-[59px] px-[70px] py-3.5 left-[942px]  absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-start items-start gap-2.5 inline-flex">
        <button class=" hover:text-yellow-200 cursor-pointer underline-on-hover" type="submit">
          <p  class=" text-white text-sm font-semibold font-['Montserrat'] leading-[22.96px]">Sauvegarder et continuer</p>
        </button>
    </div>
    <div  @click="Return_form_end" class=" w-[200px] h-[59px] px-[70px] py-3.5   absolute bg-pink-600 rounded-[5px] shadow border border-zinc-100 justify-start items-start gap-2.5 inline-flex">
        <button class=" hover:text-yellow-200 cursor-pointer underline-on-hover">
        <p  class=" text-white text-sm font-semibold font-['Montserrat'] leading-[22.96px]">Retour</p>
        </button>
    </div>
  </div>
    </div>
     
</div>
  </div>
  </div>
</form>
</div>


</template>
    
    <script setup>
 import { onMounted, ref } from 'vue';
  // Déclaration d'une variable réactive pour stocker le titre du fichier
  const fileTitle = ref('');
  
  import api from "../Api/api.js";

  const informations = ref([]);

  const info = ref({

    title: "",
    
    identifier: "",

    profession: "",

    photo: "",

    realization: "",

    description: "",
    
    skills: "",

    education: "",

    experience: "",

    cv: "",
    
    contact: "",

    adress: "",

    email: "",

    network: "",
  });

  const Show_Home = ref(true);

  const show_Form2 = ref(false);

  const show_Form3 = ref(false);

  const show_Form1 = ref(false);

  const FolioId = ref(0);

  function edit_Form1(folio_id=0){

    FolioId.value = folio_id;

    Show_Home.value = false;

    show_Form1.value = true;

    show_Form3.value = false;

    show_Form2.value = false;

  }

  function form1(){

    Show_Home.value = false;

    show_Form1.value = true;

    show_Form3.value = false;

    show_Form2.value = false;

  }
  

  function form2(){

    show_Form1.value = false;

    show_Form3.value = false;

    show_Form2.value = true;

    Show_Home.value = false;

  }

  function form3(){

    show_Form1.value = false;

    show_Form2.value = false;

    show_Form3.value = true;

    Show_Home.value = false;

  }

  function return_Form1(){

    show_Form1.value = false;

    Show_Home.value = true;

  }

function Return_Form2(){

show_Form1.value = true;

show_Form2.value = false;

show_Form3.value = false;

}

function Return_form_end(){

show_Form1.value = false;

show_Form2.value = true;

show_Form3.value = false;

}

  // Méthode pour gérer le téléversement du fichier
  const addImage = (e) => {
    e.preventDefault(); // Empêche le comportement par défaut du formulaire

    // Ouvre la fenêtre de sélection de fichier
    var uploader = wp.media(
      {
        title: 'Veuillez sélectionner l\'image',
        button: {
          text: "Sélectionner l'image(s)"
        },
        multiple: true
      }
    ).on(
      'select',
      () => {
        var selection = uploader.state().get('selection');
        selection.map(
          (attachment) => {
            attachment = attachment.toJSON();
            if(attachment.type == 'image'){
            info.value.photo = attachment.url;
            }
          }
        );
      }
    ).open();
  }

  // Méthode pour mettre à jour le titre du fichier
  const updateFileTitle = (title) => {
    fileTitle.value = title; // Met à jour le titre du fichier dans la variable réactive fileTitle
  }
  



  const fileTitle2 = ref([]);

// Méthode pour gérer le téléversement du fichier
const addImage2 = (e) => {
  e.preventDefault(); // Empêche le comportement par défaut du formulaire

  // Ouvre la fenêtre de sélection de fichier
  var uploader = wp.media(
    {
      title: 'Veuillez sélectionner l\'image',
      button: {
        text: "Sélectionner l'image(s)"
      },
      multiple: true
    }
  ).on(
    'select',
    () => {
      var selection = uploader.state().get('selection');
      selection.map(
        (attachment) => {
          attachment = attachment.toJSON();
          if(attachment.type == 'image'){
            info.value.realization = attachment.url;
          }
        }
      );
    }
  ).open();
}

const addImage3 = (e) => {
  e.preventDefault(); // Empêche le comportement par défaut du formulaire

  // Ouvre la fenêtre de sélection de fichier
  var uploader = wp.media(
    {
      title: 'Veuillez sélectionner l\'image',
      button: {
        text: "Sélectionner l'image(s)"
      },
      multiple: true
    }
  ).on(
    'select',
    () => {
      var selection = uploader.state().get('selection');
      selection.map(
        (attachment) => {
          attachment = attachment.toJSON();
          if(attachment.type == 'image'){
            info.value.cv = attachment.url;
          }
        }
      );
    }
  ).open();
}

onMounted(async () =>{

  await showFolios();

});

const addFolio = async() => {

  console.log('add');

  const add_folio = await api.createFolio(info.value);

  if(add_folio.success) {

    console.log(add_folio);

    await showFolios();  

  }

};


const showFolios = async() => {

  const response = await api.getFolios();

  if(response) {

    informations.value = response;

    show_Form2.value = false;

    show_Form3.value = false;

    show_Form1.value = false;

    Show_Home.value = true;    

  }

};

const update_Folio = async() => {

  console.log("fonction update folioid:"+FolioId.value);

  const updateFolio = await api.updateFolio(FolioId.value, info.value);

  if(updateFolio){

    FolioId.value = 0;
    
    await showFolios();

  }

}

const delFolio = async(folio_id) => {

  const delete_Folio = await api.deleteFolio(folio_id);

  if(delete_Folio.success==true) {

    console.log(delete_Folio);

    await showFolios();

  }

}

// Méthode pour mettre à jour le titre du fichier
const updateFileTitle2 = (title) => {
  fileTitle2.value.push(title)  ; 
  console.log('fileTitle2', fileTitle2.value)
  // Met à jour le titre du fichier dans la variable réactive fileTitle
}



  
const addedProfiles = ref([]);
  const newProfileName = ref('');

  const addProfile = () => {
    if (newProfileName.value.trim() !== '') {
      addedProfiles.value.push(newProfileName.value);
      newProfileName.value = '';
    }
  }

  const removeProfile = (index) => {
    addedProfiles.value.splice(index, 1);
  }

// Déclaration d'une variable réactive pour stocker le titre du fichier
const fileTitle1 = ref('');

const addedCompétences = ref([]);
const newCompétencesName = ref('');

const addCompétences = () => {
  if (newCompétencesName.value.trim() !== '') {
    addedCompétences.value.push(newCompétencesName.value);
    newCompétencesName.value = '';
  }
}

const removeCompétences = (index) => {
  addedCompétences.value.splice(index, 1);
}    
    
    </script>
    
    <style>
    
    
  </style>