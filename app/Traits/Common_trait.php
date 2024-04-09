<?php
    namespace App\Traits;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

        trait Common_trait{
                public function create_unique_slug($string = '', $table = '', $field = 'slug', $col_name = null, $old_slug = null)
                {
                    $slug = Str::of($string)->slug('-');
                    $slug = strtolower($slug);

                    $i = 0;
                    $params = array();
                    $params[$field] = $slug;
                    if ($col_name) {
                        $params["$col_name"] = "<> $old_slug";
                    }
                    while (DB::table($table)->where($params)->count()) {
                        if (!preg_match('/-{1}[0-9]+$/', $slug)) {
                            $slug .= '-' . ++$i;
                        } else {
                            $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
                        }
                        $params[$field] = $slug;
                    }
                    return $slug;
                }

                public $public_path = 'uploads';

                public function file( $file, $path, ) : string
                {
                    if ($file){
                        $extension       = $file->getClientOriginalExtension();
                        $file_name       = rand().'.'.$extension;
                        $url             = $file->move($this->public_path, $file_name);
                        return $file_name;
                    }
                }   

        }





