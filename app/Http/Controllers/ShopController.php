<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Brand;
use App\Category;
use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Package;
use App\Product;
use Illuminate\Http\Request;
use Elasticquent\ElasticquentTrait;


class ShopController extends GeneralController
{
    public function index()
    {
        //Banner
        $banner = Banner::where(['is_active'=>1 , 'type'=>1])
                                    ->orderBy('position', 'ASC')
                                    ->orderBy('id', 'DESC')
                                    ->first();

        $categories = Category::where([
            'is_active' => 1,
            'parent_id' =>0,
            'type'=>1,
        ])->orderBy('position','ASC')->limit(6)->get();
//        dd($categories);
        $arr = [];

        //Lấy danh mục con theo cha
        foreach ($categories as $key => $category) {
            $arr[$key]['category'] = $category;

            $ids = [$category->id]; //VD:1

            $childCategories = Category::where([
                'is_active' => 1,
                'parent_id' => $category->id,
            ])->orderBy('position','ASC')->limit(7)->get();
            foreach ($childCategories as $child) {
                $ids[] = $child->id; //VD:4,5,6,9
            }
            //ids =1,4,5,6,9

            $products = Product::whereIn('category_id', $ids)
                                    ->where(['is_active'=>1],['is_hot'=>1])
                                    ->limit(9)
                                    ->orderBy('id','desc')
                                    ->get();
            $arr[$key]['products'] = $products;
        }
//        dd($arr);
        $packages = Package::where(['is_active'=>1])
                                ->orderBy('position', 'ASC')
                                ->orderBy('id', 'DESC')
                                ->limit(3)->get();
        $brands = Brand::where(['is_active'=>1 ])
            ->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')
            ->limit(10)->get();
        return view('frontend.index',[
            'banner'=> $banner,
            'arr' => $arr,
            'brands' => $brands,
            'packages' => $packages,
            ]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $list = [];
        foreach ($categories as $key => $category) {
            $list[$key]['category'] = $category->name;
            $list[$key]['slug'] = $category->slug;
            $quantity = Product::where(['is_active'=>1,'category_id' => $category->id])->count();
            $list[$key]['qty'] = $quantity;
        }

        $keyword = $request->input('q');
        $slug = str_slug($keyword);

        $products = Product::where([['is_active',1],['slug','LIKE', '%'.$slug.'%']])
                                    ->orderBy('position', 'ASC')
                                    ->orderBy('id', 'DESC')->paginate(6);
        $totalResult = $products->total();

        return view('frontend.project.search',[
                'totalResult'=>$totalResult,
                'products'=> $products,
                'keyword'=> $keyword ? $keyword :'',
                'list' =>$list,

        ]);
    }
    public function searchNew(Request $request)
    {
        $keyword = $request->input('q');

//        $slug = str_slug($keyword);

//        $products = Product::where([['is_active',1],['slug','LIKE', '%'.$slug.'%']])
//            ->orderBy('position', 'ASC')
//            ->orderBy('id', 'DESC')->paginate(6);

        $data = Product::searchByQuery(['match' => ['name' => $keyword]]);
//        dd($data);
        $products = $data->all();
        dd(gettype($products));
        foreach ($products as $key => $value) {
            dd($value);
        }

//        $pr = (object) $products;
//        dd($pr);
        $totalResult = $data->count();

        return view('frontend.project.search',[
            'totalResult'=>$totalResult,
            'products'=> $products,
            'keyword'=> $keyword ? $keyword :'',
            'pr'=>$pr

        ]);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function postContact(ContactRequest $request)
    {
        $validated = $request->validated();
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        return response()->json(['success' => true]);
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()){
////            return response()->json(['errors' => $validator->errors()], 404);
////            return back()->withErrors($validator)->withInput();
//        }
//        $request->session()->flash('msg', 'Bạn đã gửi yêu cầu thành công. Xin cảm ơn!');
//       return redirect()->route('shop.contact')->with('success', 'Bạn đã gửi yêu cầu thành công. Xin cảm ơn!');
//         return back()->with('success_message', 'User successfully created!');

    }
    public function getProjects()
    {

        $categories = Category::all();
        $list = [];
        foreach ($categories as $key => $category) {
            $list[$key]['category'] = $category->name;
            $list[$key]['slug'] = $category->slug;
            $quantity = Product::where(['is_active'=>1,'category_id' => $category->id])->count();
            $list[$key]['qty'] = $quantity;
        }
        $products = Product::where('is_active',1)
            ->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')->paginate(6);
        if (isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if ($sort_by=='az'){
                $products = Product::where('is_active', 1)
                    ->orderBy('name', 'ASC')
                    ->paginate(6)->appends(\request()->query());
            }elseif ($sort_by=='za'){
                $products = Product::where('is_active', 1)
                    ->orderBy('name', 'DESC')
                    ->paginate(6)->appends(\request()->query());
            }elseif ($sort_by=='hot'){
                $products = Product::where([['is_active', 1],['is_hot', 1]])
                    ->orderBy('id', 'DESC')
                    ->paginate(6)->appends(\request()->query());
            }
        }else{
            $products = Product::where('is_active',1)
                ->orderBy('position', 'ASC')
                ->orderBy('id', 'DESC')->paginate(6);
        }

        return view('frontend.project.list',[
            'products' => $products,
            'list' => $list
        ]);
    }
    public function category($slug)
    {
        $categories = Category::all();
        $list = [];
        foreach ($categories as $key => $category) {
            $list[$key]['category'] = $category->name;
            $list[$key]['slug'] = $category->slug;
            $quantity = Product::where(['is_active'=>1,'category_id' => $category->id])->count();
            $list[$key]['qty'] = $quantity;
        }
        $category = Category::where('slug', $slug)->first();
        $products = Product::where(['is_active'=>1,'category_id'=> $category->id])
            ->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')->paginate(6);

        return view('frontend.project.list',[
            'products' => $products,
            'list' => $list,
        ]);
    }

    public function tagProducts($tag)
    {
        $categories = Category::all();
        $list = [];
        foreach ($categories as $key => $category) {
            $list[$key]['category'] = $category->name;
            $list[$key]['slug'] = $category->slug;
            $quantity = Product::where(['is_active'=>1,'category_id' => $category->id])->count();
            $list[$key]['qty'] = $quantity;
        }
        $tag = str_replace('-', ' ', $tag);
//        dd($tag);
        $products = Product::where(['is_active'=>1])->where('tags','LIKE','%'.$tag.'%')
                                                    ->orderBy('position', 'ASC')
                                                    ->orderBy('id', 'DESC')->paginate(6);
        return view('frontend.project.list',[
            'products' => $products,
            'list' => $list
        ]);
    }
    public function getDetailProject($slug)
    {
        $product = Product::where(['is_active'=>1,'slug'=> $slug])->get();
//        dd($product->first());
        if($product->first() != null) {
            $product = $product->first();
        }else{
            return redirect()->route('shop.404');
        }

        $relatedPros = Product::where([['slug','<>',$slug],['is_active','=',1],['category_id','=', $product->category_id]])
            ->limit(9)
            ->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')
            ->get();
//        dd($product);
//        dd($relatedPros);
        return view('frontend.project.detail',[
            'product' => $product,
            'relatedPros' =>$relatedPros,
        ]);
    }

    public function getArticles()
    {
        $articles = Article::where(['is_active'=> 1, 'type'=>1])
                                ->orderBy('position', 'ASC')
                                ->orderBy('id', 'DESC')->paginate(6);

//        $test = Article::latest()->paginate(5);
//        dd($test->links());

//        dd($articles->links(),$articles);
        return view('frontend.article.list',[
            'articles' => $articles,
        ]);
    }
    public function getDetailArticle($slug)
    {
        $article = Article::where(['is_active'=>1,'slug'=> $slug])->get();

        if($article->first() != null) {
            $article = $article->first();
        }else{
            return redirect()->route('shop.404');
        }

        $newArticles = Article::where([['is_active','=', 1],['type','=',1],['slug','<>',$slug]])
            ->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')->limit(4)->get();
        return view('frontend.article.detail',[
            'article'=>$article,
            'newArticles' =>$newArticles
            ]);
    }
    public function about()
    {
        return view('frontend.about');
    }

    public function notfound()
    {
        return view('errors.404');
    }

}

