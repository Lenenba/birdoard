
                        @csrf
        

        <div class="field mb-6">
            <label for="title" class="lable text-sm mb-2 block">Title</label>
            <div class="control">

                 <input type="text" 
                        class="input bg-transparent border border-gray-100 rounded p-2 text-xs w-full" 
                        name="title"
                        require 
                        value="{{ $project->title }}"
                        placeholder="Entrer le titre de votre projet">  
            </div>
        </div>        
         
        
        <div class="field mb-6">

                   <label for="description" class="lable text-sm mb-2 block">Description</label>

                   <div class="control">
                   
                      <textarea name="description" 
                                row="50"
                                placeholder="Entrer la description de votre Projet ici"
                                require
                                class="textarea bg-transparent border border-gray-100 rounded p-2 text-xs w-full"
                     >{{ $project->description }}
                     </textarea>
                   
                   </div>
               </div>   
       

        <div class="field">
                    <div class="control">
                    <button type="submit"  class="buttonV is-link mr-6">{{ $buttonText }}</button>

       
                    <a href="{{ $project->path() }}">Cancel</a>
                    </div>
               </div>   


@if ($errors->any())

        <div class="fields mt-6">
            @foreach ($errors->all() as $error)
            
                <li class="text-sm text-red">{{ $error }}</li>

            @endforeach
        </div>

@endif