 INSERT INTO Category( name, sym_code)
 VALUES
     ( 'Доски и лыжи', 'boards'),
     ( 'Крепления', 'attachment'),
     ( 'Ботинки', 'boots'),
     ( 'Одежда', 'clothing'),
     ( 'Инструменты', 'tools'),
     ( 'Разное', 'other');

INSERT INTO User( email, name, contact, password)
VALUES
    ( 'red@gmail.com', 'Alise', '+7-904-157-94-34', 'Alise2001'),
    ( 'blue@gmail.com', 'Ethan', '+7-910-677-12-62', 'Ethan2002'),
    ('green@gmail.com', 'Joe', '+7-945-245-22-71', 'Joe2003');

INSERT INTO Lot( name, description, picture, start_price, date_end, rate_step, creator_id, winner_id, category_id)
VALUES
    ( '2014 Rossignol District Snowboard', '2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, '2023-09-21', 500, 1, 2, 1),
    ('DC Ply Mens 2016/2017 Snowboard', 'DC Ply Mens 2016/2017 Snowboard', 'img/lot-2.jpg', 159999, '2023-09-21', 1000, 1, 2, 1),
    ( 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепления Union Contact Pro 2015 года размер L/XL', 'img/lot-3.jpg', 8000, '2023-09-21', 1500, 1, 2, 2),
    ( 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки для сноуборда DC Mutiny Charocal', 'img/lot-4.jpg', 10999, '2023-09-22', 1200, 2, 1, 3),
    ( 'Куртка для сноуборда DC Mutiny Charocal', '2014 Rossignol District Snowboard', 'img/lot-5.jpg', 7500, '2023-09-22', 750, 2, 1, 4),
    ( 'Маска Oakley Canopy', 'Маска Oakley Canopy', 'img/lot-6.jpg', 5400, '2023-09-22', 2000, 2, 1, 5);

INSERT INTO Bet(id, sum, lot_id, user_id)
VALUES
    (1, 11499, 1, 3),
    (2, 11999, 1, 2);


SELECT * FROM Category;

SELECT Lot.name, start_price, picture, Category.name, date_end FROM Lot
    LEFT JOIN Category ON Lot.category_id = Category.id
    WHERE date_end > NOW() ORDER BY date_end DESC;

SELECT Lot.name, Category.name, date_reg, description, start_price, picture, date_end, rate_step, creator_id, winner_id FROM Lot
    LEFT JOIN Category ON Category.id = Lot.category_id;

UPDATE Lot
SET name = 'District Snowboard'
WHERE id = 1;

SELECT Bet.date_reg, sum, Lot.name, User.name FROM Bet
LEFT JOIN  Lot ON Lot.id = Bet.lot_id
LEFT JOIN User ON User.id = Bet.user_id
WHERE Bet.lot_id = 3 ORDER BY Bet.date_reg DESC

