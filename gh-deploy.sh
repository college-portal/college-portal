#!/bin/sh

# This code is used to push the public/docs folder in the edge branch, to the gh-pages branch on GitHub

git checkout edge
rm -rf public/docs
read -s -p "Enter Password: " ADMIN_PASSWORD
php artisan generate:docs --password=$ADMIN_PASSWORD
git add .
git commit -m "chore: generate docs"
git branch -D gh-pages
git subtree split --prefix public/docs -b gh-pages
touch public/docs/.gitignore
grep -v "public/docs" .gitignore >> public/docs/.gitignore
git checkout gh-pages
mv public/docs/.gitignore .gitignore
git add .
git commit -m "chore: generate gh-pages"
git push -d origin gh-pages
git subtree push --prefix public/docs origin gh-pages
git checkout edge

# re-generate public/docs folder
rm -rf public/docs
php artisan generate:docs --password=$ADMIN_PASSWORD
git add .
git commit -m "chore: generate docs"