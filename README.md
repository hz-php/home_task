13 задание Созданы модели и миграции постов и категорий
Также создал для наполнения бд сидеры UsersTableSeeder и CategoriesTableseeder и фабрику для наполнения постов
BlogPostFactory и заполнил бд тестовыми данными
![Image alt](Screenshot_1.png)
Создан абстрактный класс Blog/BaseController на случай расширения функционала приложения дальше все 
контроллеры Blog наследуются от Blog/BaseController
Также создан контроллер CategoryController для управления категориями для создания обновления категорий он находится
в директории Admin\ и наследуется также от BaseController на случай расширения функционала
также созданы реквесты для валидации данных 
В методе index CategoryController реализован вывод всех категорий блога
На скриншоте показан вывод категорий с id меньше 4
![Image alt](Screenshot_2.png)
![Image alt](Screenshot_11.png)
![Image alt](Screenshot.png)
также реализовано добавление и изменение категорий
![Image alt](Screenshot11.png)
![Image alt](222.png)
![Image alt](Screenshot_3.png)
![Image alt](Screenshot_4.png)
реализована валидация в классах BlogCategoryCreateRequest и BlogCategoryUpdateRequest

