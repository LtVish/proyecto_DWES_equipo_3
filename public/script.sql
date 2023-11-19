create table user(
    id int auto_increment,
    nick varchar(100),
    email varchar(100),
    full_name varchar(100),
    karma int,

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