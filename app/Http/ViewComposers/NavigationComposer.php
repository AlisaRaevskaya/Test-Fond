<?php
namespace App\Http\ViewComposers;
use App\Models\Page;
use App\Models\News;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Message;
use App\Models\MessageCategory;
use Illuminate\View\View;


//В этом классе будем доставать данные из базы и
//передавать в соответствующее представление (например, resources/layouts/partials/_nav.blade.php)

class NavigationComposer
{
    public function compose(View $view)
    {
        $menuitems = Page::IsPublished()->IsMenu()->OfSort(['parent_id' => 'asc', 'sort_order' => 'asc'])->get();
        $newsitems = News::orderBy('date_published', 'desc')->limit(7)->get();
        $contact= Contact::find(1);
        $new = News::find(1)->first();
        $category= $new->category;

       $secondmenu = Page::IsPublished()->IsSecondMenu()->OfSort(['second_sort_order' => 'asc'])->get();
       $footermenu = Page::IsPublished()->IsMenu()->where('parent_id', 2)->OfSort(['parent_id' => 'asc', 'sort_order' => 'asc'])->get();

        $not_read_message = Message::where('is_read', false)->get()->count();


        $menuitems = $this->buildTree($menuitems);


        return $view->with(compact('menuitems', 'newsitems', 'contact','category','secondmenu','footermenu','not_read_message'));
    }

    public function buildTree($items)
    {
        $grouped = $items->groupBy('parent_id');

        foreach ($items as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }
        return $items->where('parent_id', null);
    }
}
