<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


class Permissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     

    public function handle(Request $request, Closure $next)
    {
        Log::debug('Passou aqui');

        $permissao = 1;

        $routes = Route::currentRouteName();

        $route = explode('.',$routes);

        $tela = $route[0];
        $metodos = $route[1];

        switch ($permissao) {
            case 1:
                if($tela == 'cursos' || $tela == 'eixos'){
                    if($metodos == 'index') return $next($request);
                    
                }
                break;
            case 2:
                if($tela == 'matriculas' || $tela == 'docencias') return response()->view('templates.erro',compact('tela'));
                if($tela == 'eixos' || $tela == 'cursos'){ return $next($request); }
                else{
                    
                    if($metodos == 'index') return $next($request); 
                }
                break;
            case 3:
                return $next($request);
                break;
        }


        return response()->view('templates.erro',compact('tela'));
    }
}