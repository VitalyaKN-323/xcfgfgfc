create database kuchta;


CREATE TABLE Courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES Teachers(id)
);

INSERT INTO Courses (name, description, teacher_id)
VALUES 
    ('Вступ до програмування', 'Опис курсу...', 3),
    ('Англійська мова', 'Опис курсу...', 2),
    ('Математичний аналіз', 'Опис курсу...', 1);


    CREATE TABLE Students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    course VARCHAR(50)
);

INSERT INTO Students (first_name, last_name, email, course)
VALUES 
    ('Іван', 'Петров', 'ivan@example.com', '1 курс'),
    ('Марія', 'Іванова', 'maria@example.com', '3 курс'),
    ('Петро', 'Сидоров', 'petro@example.com', '2 курс');

    CREATE TABLE Grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    subject_id INT,
    teacher_id INT,
    grade DECIMAL(3, 1),
    FOREIGN KEY (student_id) REFERENCES Students(id),
    FOREIGN KEY (subject_id) REFERENCES Subjects(id),
    FOREIGN KEY (teacher_id) REFERENCES Teachers(id)
);

INSERT INTO Grades (student_id, subject_id, teacher_id, grade)
VALUES 
    (1, 1, 1, 4.5),
    (2, 2, 2, 4.0),
    (3, 3, 3, 5.0);


    CREATE TABLE Subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(50)
);

INSERT INTO Subjects (name, code)
VALUES 
    ('Математика', 'MATH101'),
    ('Фізика', 'PHYS101'),
    ('Історія', 'HIST101');

    
CREATE TABLE Teachers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    subject VARCHAR(100),
    position VARCHAR(100)
);

INSERT INTO Teachers (first_name, last_name, email, subject, position)
VALUES 
    ('Олександр', 'Коваленко', 'oleksandr@example.com', 'Математика', 'Доцент'),
    ('Наталія', 'Петренко', 'natalia@example.com', 'Фізика', 'Старший викладач'),
    ('Андрій', 'Сидоренко', 'andriy@example.com', 'Історія', 'Професор');
    CREATE TABLE products (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    discount DECIMAL(5, 2),
    img VARCHAR(255),
    descr TEXT,
    category VARCHAR(255),
    expiry_date VARCHAR(50),
    manufacturer VARCHAR(255),
    composition TEXT
);

INSERT INTO products (id, title, price, discount, img, descr, category, expiry_date, manufacturer, composition) VALUES
(1, 'Банан', 20.00, 5.00, 'banana.webp', 'Банан як банан що тут сказати.', 'Фрукти', '5 днів', 'Ферма ''Сонячне Лукошко''', '100% банани'),
(2, 'Яблуко', 15.00, 15.00, 'yabko.webp', 'Яблуко(зелене)', 'Фрукти', '7 днів', 'Органічні ферми Зелений Сад', 'Яблука веганського виробництва'),
(3, 'Молоко', 25.00, 5.00, 'Milk.webp', 'Молоко 3.2% жиру', 'Молочка', '10 днів', 'Кооператив ''Молочна Родина''', 'Молоко, стабілізатори'),
(4, 'Хліб', 21.00, 50.00, 'Bread.webp', 'Хліб(білий пшеничний)', 'Випічка', '3 дні', 'Пекарня ''Смачний кущ''', 'Пшеничне борошно, вода, дріжжі, сіль'),
(5, 'Живчик', 40.00, 30.00, 'aple.webp', 'Солодка водичка - Живчик', 'Напої', '30 днів', '''Очищена Смаковитість''', 'Вода, цукор, ароматизатори'),
(6, 'Філe кур\'яче', 138.00, 10.00, 'chike.webp', 'Грудка куряча', 'М\'ясо', '5 днів', 'Ферма ''Смачна Курочка''', 'М\'ясо курки'),
(7, 'Апельсиновий сік', 10.00, 2.00, 'apelsinshake.webp', 'Апельсиновий сік', 'Напої', '7 днів', 'Фабрика ''Соковиті Квіти''', 'Сок з апельсинів, вода, цукор'),
(8, 'Сир', 59.00, 5.00, 'sirr.webp', 'Сир пористий', 'Молочка', '14 днів', 'Сирна Ферма ''Пухнасті обійми''', 'Молоко, закваска, сіль'),
(9, 'Помідор', 10.00, 5.00, 'tomato.webp', 'Помідор соковитий квасни)))))', 'Овочі', '5 днів', 'Сади''Сонячний урожай''', 'Органічного виробництва'),
(10, 'Огірок', 8.00, 0.00, 'Gg.webp', 'Ну огірок нічо більше.', 'Овочі', '7 днів', 'Органічні городи ''Зелений дім''', 'Огірки без ГМО'),
(11, 'Суші', 200.00, 4.00, 'susi.webp', 'Суші з лососем 300грам.', 'Готові страви', '1 день', 'Ресторан ''Смачні Суші''', 'Рис, лосось, норі, соєвий соус'),
(12, 'Віскі', 3500.00, 15.00, 'VISKI.webp', 'Віскі', 'Алкоголь', 'Необмежений', '''Джентльменська Традиція''', 'Зі спеціально відібраних зерен-Віскі.');