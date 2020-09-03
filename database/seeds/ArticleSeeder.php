<?php

use Illuminate\Database\Seeder;
use App\Model\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=30; $i++)
        {
            if($i%5==0)
                Article::create([
                    "user_id"=>'1',
                    "title"=>"Тест ".$i,
                    "discription"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Neque aspernatur sapiente aut, fugiat necessitatibus illo ex recusandae 
                    eligendi quibusdam veritatis nulla nihil repellat aliquam obcaecati labore 
                    voluptatibus at? Saepe ducimus minima fugiat, reprehenderit itaque cumque 
                    impedit ab qui magnam dolorum voluptate odio deserunt, dolor quasi possimus 
                    neque accusantium? Porro libero voluptatibus quisquam in aliquid mollitia, 
                    ratione nemo repellendus rem odio, tempore eaque animi! Impedit nesciunt 
                    distinctio aut atque eum optio. Ad consectetur omnis maiores vero debitis eaque sapiente 
                    cupiditate odio iste cumque doloribus, nostrum, deleniti molestiae numquam magnam repudiandae 
                    itaque reiciendis nisi. Cum commodi alias excepturi dolor corporis, blanditiis quod.".$i
                ]);
                
            elseif ($i%11==0)
                Article::create([
                    "user_id"=>'1',
                    "title"=>"Тест ".$i,
                    "discription"=>"тест-тест ".$i,
                    "status_id"=>'2'
                ]);  
            else
                Article::create([
                    "user_id"=>'1',
                    "title"=>"Тест ".$i,
                    "discription"=>"Eu officia dolor ipsum proident. Sint ullamco irure amet labore adipisicing laborum aute. 
Ullamco eiusmod laboris mollit consequat reprehenderit magna deserunt amet commodo. Deserunt consectetur 
anim officia dolore id minim dolore dolore ex non. Aliquip do do aliqua ex nisi ut. Minim in fugiat sit 
proident Lorem consectetur ut labore ut nisi est mollit qui culpa. Qui anim exercitation cupidatat aliqua.
Est irure magna aliquip consectetur. Ea consectetur eiusmod elit quis veniam voluptate sint amet occaecat.
Tempor ad occaecat nostrud do tempor et veniam pariatur eiusmod elit. Ex sunt exercitation irure et adipisicing
quis id ut laborum nostrud. Nisi magna aliquip irure ipsum fugiat nisi cillum occaecat consequat voluptate irure
laborum nisi. Dolore culpa eu irure ut est proident qui laboris velit do non deserunt. Ipsum cupidatat do consequat
Voluptate ut ex do est cupidatat do non nulla labore. Eiusmod voluptate pariatur eiusmod eiusmod aliqua occaecat
laboris anim exercitation consequat officia dolor ipsum nostrud. Officia est excepteur et occaecat sint esse veniam
excepteur dolore esse. Proident Lorem velit adipisicing nisi irure. Sunt commodo magna fugiat consectetur. Officia
minim cupidatat elit voluptate aliqua. Labore excepteur excepteur in non. Velit consectetur deserunt labore magna
veniam qui sit proident consectetur voluptate. Cillum adipisicing minim aute dolore voluptate aliqua cupidatat
exercitation ex eiusmod deserunt non. Ipsum anim labore ullamco culpa aliqua ipsum mollit laborum. Voluptate enim
aliquip cillum consectetur id aliqua veniam culpa minim ut. Cupidatat minim nostrud aute ut. Irure magna eiusmod
eiusmod veniam eiusmod elit enim. Occaecat fugiat consectetur tempor ad aliquip. Sunt ea ullamco aute velit laboris
duis magna culpa duis nisi in proident sint. Pariatur tempor quis ullamco velit ipsum incididunt proident enim ea. 
Voluptate ut ex do est cupidatat do non nulla labore. Eiusmod voluptate pariatur eiusmod eiusmod aliqua occaecat
laboris anim exercitation consequat officia dolor ipsum nostrud. Officia est excepteur et occaecat sint esse veniam
Voluptate ut ex do est cupidatat do non nulla labore. Eiusmod voluptate pariatur eiusmod eiusmod aliqua occaecat
laboris anim exercitation consequat officia dolor ipsum nostrud. Officia est excepteur et occaecat sint esse veniam
eiusmod veniam eiusmod elit enim. Occaecat fugiat consectetur tempor ad aliquip. Sunt ea ullamco aute velit laboris
duis magna culpa duis nisi in proident sint. Pariatur tempor quis ullamco velit ipsum incididunt proident enim ea. 
Voluptate ut ex do est cupidatat do non nulla labore. Eiusmod voluptate pariatur eiusmod eiusmod aliqua occaecat
laboris anim exercitation consequat officia dolor ipsum nostrud. Officia est excepteur et occaecat sint esse veniam
eiusmod veniam eiusmod elit enim. Occaecat fugiat consectetur tempor ad aliquip. Sunt ea ullamco aute velit laboris
duis magna culpa duis nisi in proident sint. Pariatur tempor quis ullamco velit ipsum incididunt proident enim ea. 
Voluptate ut ex do est cupidatat do non nulla labore. Eiusmod voluptate pariatur eiusmod eiusmod aliqua occaecat
laboris anim exercitation consequat officia dolor ipsum nostrud. Officia est excepteur et occaecat sint esse veniam
non eiusmod minim non amet cillum. Quis cillum est adipisicing culpa velit.".$i,
                    "status_id"=>'3'
                ]);
        }
    }
}
