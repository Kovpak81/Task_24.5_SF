<?

class Route
{
    public static function start()
    {
        // к дефолтной(шаблону) странице подключится по умолчанию страница Main (контролер и вид) с её методом (функцией) index
        $controller_name = 'Main';
        $action_name = 'index';

        // если только зашли на сайт $routes еще не присвоено $_GET['url'] и будет использован дефолтные настройки (т.е. по умолчанию), а если перешли на другую страницу, то сработает переменная $controller_name будет присвоено другое значение переменной $routes
        $routes = $_GET['url'];
        if(!empty($routes))
        {
            $controller_name = $routes;
        }

        // subtract prefics
        // $model_name = 'model_'.$controller_name;
        // переменная будет являтся названием класса контроллера
        $controller_name = 'controller_'.$controller_name;
        // это название метода в классе (в этом фреймворке они у всех классов одинаковые)
        $action_name = 'action_'.$action_name;

        // это пока не нужно
        // подцепляем файл с классом модели (файла модели может и не быть)
        // $model_file = strtolower($model_name).'.php';
        // $model_path = "application/models/".$model_file;
        // if(file_exists($model_path))
        // {
        //     include "application/models/".$model_file;
        // }

        // подцепляем файл с классом контроллера
        // переводим название класса в нижний регистр, добавляем .php и получаем название файла-контроллера
        $controller_file = strtolower($controller_name).'.php';
        // проверяем, если такой файл есть, то подключаем этот файл
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }

        // создаем контроллер, т.е. новый класс например Controller_Main
        $controller = new $controller_name;
        // создаем переменную с названием метода класса (функции)
        $action = $action_name;

        // делаем проверку на наличие класса и метода
        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера, т.е. вызываем функцию (метод) класса контроллера
            $controller->$action();
        }
        else
        {
            Route::ErrorPage404();
        }


    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}