##3.Какие ситуации, вызывающие рост количества запросов, могут случаться на сервере? Мы рассмотрели не все.

* нужно проверить настройки
  max_connections 
  query_cache_size, query_cache_limit, query_cache_type 
  tmp_table_size, max_heap_table_size 

* включить журнал "тяжелых" запросов slow_query_log 

* исключить ситуации возникновения deadlock, если таковые имеются

##4. В каких случаях индекс в MySQL не будет применятся, даже если он доступен и выборка должна использовать его?

* Если индекс имеет два столбца, то порядок, который запрашивается для этих полей , имеет значение -   индекс не применятся  если запрашивается не самый левый столбец в индексе.

* Если в выражении LIKE используется строка начинающаяся с шаблонного символа, или если строка не является константой.

* Если по итогам работы оптимизатора предполагаемое количество возвращаемых строк будет более трети от всех записей таблицы.

##5. Как принудительно применить индекс?

 Нужно использовать директивы FORCE INDEX, USE INDEX