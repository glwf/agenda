Recently, the axios dependency was removed from the package.json file due to a security warning issued by GitHub. 
The warning identified a potential Server-Side Request Forgery (SSRF) vulnerability associated with the package.json

```sh
git clone https://github.com/glwf/agenda.git
cd agenda
```
add axios to package.json
```json
"devDependencies": {
        "@tailwindcss/forms": "^0.5.2",
        "autoprefixer": "^10.4.2",
        "axios": "^1.7.4",
        "laravel-vite-plugin": "^0.8.0",
        "postcss": "^8.4.6",
        "tailwindcss": "^3.1.0",
        "vite": "^4.0.0"
    }
```
then run 'npm update' on terminal
```sh
npm update
```
