<?php

namespace App\Console\Commands;

//use ClassPreloader\Config;
use Doctrine\Common\Inflector\Inflector;
use Illuminate\Console\Command;
use App;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class AdminViewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {model : The model Name} {--f|folder : The parent folder name inside views directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Admin Views';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $files;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $model = $this->argument('model');
        $folder = $this->option('folder');
        $path = Config::get('view.paths');
        $class = "App".DIRECTORY_SEPARATOR.$model;
        $model = new $class();
        $directory = $path[0];
        if(isset($folder)){
            foreach(explode('.',$folder) as $subfolders)
            $directory =$directory.DIRECTORY_SEPARATOR.$subfolders;
        }
        $directory .= DIRECTORY_SEPARATOR.$model->getTable();
        //mkdir($path);

        if(!is_dir($directory))
        {
            // Create the directory if not.
            mkdir($directory, 0755, true);
        }
        $coloumns = Schema::getColumnListing($model->getTable());
        $this->makeIndex($directory,$model,$coloumns);
        $this->makeForm($directory,$model,$coloumns);
        $this->makeCreate($directory,$model,$coloumns);
        $this->makeEdit($directory,$model,$coloumns);
        $this->comment("Generates Admin views ".$directory);
    }

    private function makeIndex($directory,$model,$coloumns)
    {
        $content = "@extends('backend.master')\n";
        $content .="@section('content')\n";
        $content.="<table class='table'>\n";
        $content .="\t<tbody>\n\t\t<tr>\n";
        foreach($coloumns as $coloumn)
            $content.="\t\t\t<th>$coloumn</th>\n";
        $content.="\t\t\t<th>Actions</th>\n";

        $content .="\t\t</tr>\n";
        $content .="\t\t".'@foreach($records as $record)'."\n";
        $content.="\t\t\t<tr>\n";
        foreach($coloumns as $coloumn)
            $content.="\t\t\t\t<td>{{".'$record->'.$coloumn.'}}</td>'."\n";
        $content .="\t\t\t\t<td>".'<a class="btn btn-info btn-sm" href="{{route(\'backend.'.$model->getTable().'.edit\', $record->id)}}"><i class="fa fa-btn fa-edit"></i>Update</a>'."\n";
        $content .="\t\t\t<form action=\"{{ route('backend.".$model->getTable().".destroy',\$record->id) }}\" method=\"POST\" class='inline'>
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}

						<button type=\"submit\" id=\"delete-task-{{ \$record->id }}\" class=\"btn btn-danger btn-sm\">
							<i class=\"fa fa-btn fa-trash\"></i>Delete
						</button>
					</form></td>\n";

        $content.="\t\t\t</tr>\n";
        $content .="\t\t@endforeach\n";


        $content.="\t</tbody>\n</table>\n";
        $content .="@stop";
        file_put_contents($directory.DIRECTORY_SEPARATOR.'index.blade.php',$content);
    }

    private function makeForm($directory,$model,$coloumns)
    {
        $content = '<form class="form" method="post" action="{{isset($record) ? route("backend.'.$model->getTable().'.update", $record->id) : route("backend.'.$model->getTable().'.store")}}\">'."\n";
        foreach($coloumns as $coloumn)
        {
            if($coloumn=='id'||$coloumn=='created_at'||$coloumn=='updated_at'||$coloumn=='slug')
                continue;
            $content.='<div class="form-group">
			{{Form::label(\''.$coloumn.'\',\''.ucwords($coloumn).':\')}}
			{{Form::text(\''.$coloumn.'\',isset($record->'.$coloumn.')? $record->'.$coloumn.': null,[\'class\'=>\'form-control\'])}}
		</div>'."\n";
        }


        $content.= '<input type="hidden" name="_token" value="{{csrf_token()}}"></input>

		@if(isset($record))
			<input type="hidden" name="_method" value="put">
		@endif';
        $content .= "\n<div class=\"form-group\">
			{{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
		</div>\n";
        $content.="\n</form>";
        file_put_contents($directory.DIRECTORY_SEPARATOR.'_form.blade.php',$content);

    }

    private function makeCreate($directory,$model,$coloumns)
    {
        $last_part = str_replace(DIRECTORY_SEPARATOR,'.', substr(strrchr($directory, "views"), 6));
        $content = "@extends('backend.master')\n";
        $content .="@section('title')\n\tCreate New ".Inflector::singularize($model->getTable())."\n";
        $content .="@stop\n";
        $content .="@section('content')\n";
        $content .="\t@include('$last_part._form')\n";
        $content .="@stop";
        file_put_contents($directory.DIRECTORY_SEPARATOR.'create.blade.php',$content);
    }
    private function makeEdit($directory,$model,$coloumns)
    {
        $last_part = str_replace(DIRECTORY_SEPARATOR,'.', substr(strrchr($directory, "views"), 6));
        $content = "@extends('backend.master')\n";
        $content .="@section('title')\n\t Editing ".'{{$record->name}}'."\n";
        $content .="@stop\n";
        $content .="@section('content')\n";
        $content .="\t@include('$last_part._form', ['record' => \$record])\n";
        $content .="@stop";
        file_put_contents($directory.DIRECTORY_SEPARATOR.'edit.blade.php',$content);
    }
}
