create table user(
    id int auto_increment,
    nick varchar(100),
    email varchar(100),
    full_name varchar(100),
    karma int,
    subscription boolean,

    primary key(id)
);

create table post(
    id int auto_increment,
    title varchar(100),
    content text,
    tags varchar(200),
    category varchar(100),
    publish_date date,
    image varchar(100),
    creator_id int,
    likes int,

    primary key(id),
    foreign key(creator_id) references user(id)
);

create table specie(
    id int auto_increment,
    name varchar(100),
    climate varchar(100),
    region varchar(100),
    growth_time_days int,
    benefits text,
    image varchar(100),
    link varchar(200),

    primary key(id)
);

create table event(
    id int auto_increment,
    name varchar(100),
    description text,
    terrain varchar(100),
    date date,
    type varchar(100),
    creator_id int,
    image varchar(100),
    location varchar(100),

    primary key(id),
    foreign key(creator_id) references user(id)

);

create table participant(
    user_id int,
    event_id int,

    primary key(user_id, event_id),
    foreign key(user_id) references user(id),
    foreign key(event_id) references event(id)
);

create table specie_event(
    specie_id int,
    event_id int,

    primary key(specie_id, event_id),
    foreign key(specie_id) references specie(id),
    foreign key(event_id) references event(id)
);

-- Inserts para la tabla 'user'
INSERT INTO user (nick, email, full_name, karma, subscribed)
VALUES ('admin', 'admin@example.com', 'Admin Adminson', 100, true),
       ('johndoe', 'johndoe@example.com', 'John Doe', 75, true),
       ('janedoe', 'janedoe@example.com', 'Jane Doe', 80, true),
       ('alexmiller', 'alexmiller@example.com', 'Alex Miller', 65, false),
       ('emilybrown', 'emilybrown@example.com', 'Emily Brown', 90, true);

-- Inserts para la tabla 'post'
INSERT INTO post (title, content, tags, category, publish_date, image, creator_id, likes)
VALUES ('Cómo cultivar tomates en casa', 'Aquí están los pasos para cultivar tomates en tu jardín.', 'tomates/jardinería/cultivo', 'Horticultura', '2024-02-28', 'tomates.jpg', 2, 15),
       ('Recetas saludables para el desayuno', 'Descubre estas recetas fáciles y deliciosas para empezar el día con energía.', 'desayuno/recetas/saludable', 'Cocina', '2024-02-27', 'desayuno.jpg', 3, 25),
       ('10 consejos para cuidar tus plantas de interior', 'Consejos útiles para mantener tus plantas de interior saludables y felices.', 'plantas/interior/consejos', 'Jardinería', '2024-02-26', 'plantas_interior.jpg', 4, 10),
       ('Guía de viaje para explorar Europa en un mes', 'Descubre los mejores lugares para visitar durante un viaje por Europa.', 'viaje/Europa/guía', 'Viajes', '2024-02-25', 'europa_viaje.jpg', 5, 30),
       ('Consejos para mejorar tu productividad en el trabajo', 'Aumenta tu productividad con estos simples consejos.', 'productividad/trabajo/consejos', 'Carrera', '2024-02-24', 'productividad_trabajo.jpg', 2, 20);

-- Inserts para la tabla 'specie'
INSERT INTO specie (name, climate, region, growth_time_days, benefits, image, link)
VALUES ('Tomate', 'Templado', 'Todo el mundo', 90, 'Rico en antioxidantes y vitaminas', 'tomate.jpg', 'https://es.wikipedia.org/wiki/Solanum_lycopersicum'),
       ('Albahaca', 'Templado', 'Mediterráneo', 60, 'Propiedades antiinflamatorias y antioxidantes', 'albahaca.jpg', 'https://es.wikipedia.org/wiki/Ocimum_basilicum'),
       ('Aloe Vera', 'Cálido', 'África', 120, 'Beneficios para la piel y el cabello', 'aloe_vera.jpg', 'https://es.wikipedia.org/wiki/Aloe_vera'),
       ('Cedro', 'Frío', 'Norteamérica', 150, 'Madera duradera y aromática', 'cedro.jpg', 'https://es.wikipedia.org/wiki/Cedrus'),
       ('Lavanda', 'Templado', 'Mediterráneo', 90, 'Aroma relajante y propiedades calmantes', 'lavanda.jpg', 'https://es.wikipedia.org/wiki/Lavandula');

-- Inserts para la tabla 'event'
INSERT INTO event (name, description, terrain, date, type, creator_id, image, location)
VALUES ('Feria de Agricultura Sostenible', 'Evento anual dedicado a la promoción de la agricultura sostenible.', 'Campo', '2024-03-15', 'Feria', 3, 'feria_agricultura.jpg', 'Granja Ecológica "La Esperanza"'),
       ('Taller de Cocina Saludable', 'Aprende a preparar platos saludables y deliciosos con ingredientes naturales.', 'Cocina', '2024-03-20', 'Taller', 4, 'taller_cocina.jpg', 'Escuela de Cocina "Sabores Naturales"'),
       ('Excursión de Observación de Aves', 'Únete a nosotros para una emocionante excursión de observación de aves en el bosque local.', 'Bosque', '2024-03-25', 'Excursión', 2, 'observacion_aves.jpg', 'Reserva Natural "Los Pájaros"'),
       ('Conferencia sobre Sostenibilidad', 'Conferencia dirigida a promover la conciencia sobre la sostenibilidad y el medio ambiente.', 'Centro de Convenciones', '2024-03-30', 'Conferencia', 5, 'conferencia_sostenibilidad.jpg', 'Centro de Convenciones "Verde Vivo"'),
       ('Curso de Jardinería Urbana', 'Aprende a cultivar tu propio jardín en casa, incluso en espacios pequeños.', 'Terraza', '2024-04-05', 'Curso', 3, 'curso_jardineria.jpg', 'Vivero "Jardines Urbanos"');

-- Inserts para la tabla 'participant'
INSERT INTO participant (user_id, event_id)
VALUES (2, 1),
       (3, 2),
       (4, 3),
       (5, 4),
       (2, 5);

-- Inserts para la tabla 'specie_event'
INSERT INTO specie_event (specie_id, event_id)
VALUES (1, 1),
       (2, 2),
       (3, 3),
       (4, 4),
       (5, 5);
