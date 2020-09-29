
                <div class="card flex flex-col" style="height: 200px;">
                    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-200 pl-4">
                        <a href="{{ $project->path()}}" class="text-black no-underline">{{ Illuminate\Support\Str::limit($project->title,20) }}</a></h3>
                
                    <div class="break mb-4 flex-1">{{ Illuminate\Support\Str::limit($project->description, 80) }}</div>

                    <footer>
                        <form action="{{ $project->path() }}" method="post" class="text-right">
                            @method('delete')
                            @csrf
                            <button type="submit" class="text-xs">Delete</button>
                        </form>
                    </footer>
                </div>