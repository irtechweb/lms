<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\logroutes;

class urlrecorder
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
        
        try{
            $data=[];
            $data['user_id'] = Auth::user()->id;
            $data['page'] = request()->segments()[0];
            switch (request()->segments()[0]) {
              case 'calendly':            
                $data['objecttype']='page';
                break;
              case 'practise':
                $data['objecttype']='page';
                break;
              case 'webinars':            
                $data['objecttype']='page';            
                break;
             case 'book-webinar':
                $data['objecttype']='webinar';
                $data['objectid']=$request->only('web_id')['web_id'];
                break;
            case 'course-lesson':
                $data['objecttype']='course-lesson';
                $data['objectid']=request()->segments()[1];
                break;
            case 'payment-details':
                $data['objecttype']='viewsubscription';
                $data['objectid']=$request->only('selected-plan')['selected-plan'];
                break;
            case 'payment':
                $data['objecttype']='buysubscription';
                $data['objectid']=$request->only('subscription_id')['subscription_id'];
                break;
            case 'paypal':
                $data['objecttype']='buysubscriptionpaypal';
                //$data['object_id']=$request->only('subscription_id')['subscription_id'];
                break;

            default:
                
            }
            logroutes::create($data);
        }catch(\Exception $e){
            \Log::info($e->getMessage());
        }        
        return $next($request);
    }
}
