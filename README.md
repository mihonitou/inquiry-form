アプリケーション名 ingury-form
環境構築
 Dockerビルド
  git clone リンク
  docker-compose up -d build
 Laravel環境構築
  1 docker-compose exec php bash
  2 composer insall
  3 env.exampleファイルからenv.を作成し、環境変数変更
  4 php artisan key:generete
  5 php artisan db:seed
使用技術
  Larevel 8.38.8
URL
 開発環境　http://localhost/
 phpmyadmin http://localhost:8080/
  
　
