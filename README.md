# WordPress Local Setup Documentation (Windows)

## Prerequisites
- I installed [XAMPP](https://www.apachefriends.org/)
- I downloaded [WordPress](https://wordpress.org/download/)

---

## 1. Install WordPress Locally
1. **I installed XAMPP** and started `Apache` and `MySQL`.
2. I extracted WordPress into `C:\xampp\htdocs\wttechblog`.
3. I opened [phpMyAdmin](http://localhost/phpmyadmin) and created a database `wpb_db`.
4. I opened `http://localhost/wttechblog` and completed the WordPress installation.

---

## 2. Explore the Dashboard & Create Pages
1. I logged in to `http://localhost/wttechblog/wp-admin`.
2. I went to **Pages > Add New**, created a **Home** and **About** page.
3. I set the **Home** page as static under **Settings > Reading**.

---

## 3. Write Your First Blog Post
1. I went to **Posts > Add New**.
2. I added a title, content, and assigned categories/tags.
3. I clicked **Publish**.

---

## 4. Install & Activate a Theme
1. I went to **Appearance > Themes > Add New**.
2. I chose a free theme and clicked **Install > Activate**.

---

## 5. Push This Document to GitHub
1. I created a `README.md` file and added this guide.
2. I initialized Git and pushed to GitHub:
   ```bash
   git init
   git add README.md
   git commit -m "Added WordPress setup guide"
   git branch -M main
   git remote add origin <my-repository-url>
   git push -u origin main
   ```

🚀 **Done! I have successfully set up WordPress locally.**
