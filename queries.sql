INSERT INTO categories SET categ_id = "board", categ_name = "Доски и лыжи";
INSERT INTO categories SET categ_id = "kreps", categ_name = "Крепления";
INSERT INTO categories SET categ_id = "boots", categ_name = "Ботинки";
INSERT INTO categories SET categ_id = "clothes", categ_name = "Одежда";
INSERT INTO categories SET categ_id = "tools", categ_name = "Инструменты";
INSERT INTO categories SET categ_id = "misc", categ_name = "Разное";

INSERT INTO users SET user_id = "", user_name = "Дима", user_email = "dima@gmail.com", user_password="33332",user_image="user.png", user_signup_date="04.03.2021", user_contact="89275858587";
INSERT INTO users SET user_id = "", user_name = "Сергей", user_email = "serega@gmail.com", user_password="44455",user_image="user_serega.png", user_signup_date="03.02.2021", user_contact="89236911187";


INSERT INTO lots SET  lot_cr_date="04.03.2021", lot_name="Ботинки", lot_discr="111", lot_image="botinki.png", lot_start_price="2500", lot_comp_date="05.03.2021";
INSERT INTO lots SET  lot_cr_date="04.03.2021", lot_name="Одежда", lot_discr="112", lot_image="odezhda.png", lot_start_price="20500", lot_comp_date="06.03.2021";


INSERT INTO rate SET rate_id="1", rate_date="05.03.2021", rate_price="1250";




SELECT * FROM lots WHERE lot_cr_date > SUBDATE(now(),0);
UPDATE lots SET lot_name = "novoe imya" WHERE lot_id = "1";
SELECT lot_id FROM rate WHERE rate_date > SUBDATE(now(),0);




