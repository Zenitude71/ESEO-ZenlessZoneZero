USE ZenlessZoneZero;

-- INSERT ELEMENTS
INSERT INTO element (name, url_img) VALUES
    ('Electric', 'public/img/element/electric.png'),
    ('Ether', 'public/img/element/ether.png'),
    ('Fire', 'public/img/element/fire.png'),
    ('Ice', 'public/img/element/ice.png'),
    ('Physical', 'public/img/element/physical.png'),
    ('Wind', 'public/img/element/wind.png'),
    ('Other', 'public/img/element/other.png');


-- INSERT ORIGINS
INSERT INTO origin (name, url_img) VALUES
    ('Cunning Hares', 'public/img/origin/cunninghares.png'),
    ('Belobog Heavy Industries', 'public/img/origin/belobog.png'),
    ('Victoria Housekeeping', 'public/img/origin/victoria.png'),
    ('Hollow Special Operations Section 6', 'public/img/origin/hollow6.png'),
    ('OBSIDIAN', 'public/img/origin/obsidian.png');


-- INSERT UNITCLASSES
INSERT INTO unitclass (name, url_img) VALUES
    ('Attaque', 'public/img/unitclass/attaque.png'),
    ('Défense', 'public/img/unitclass/defense.png'),
    ('Soutien', 'public/img/unitclass/soutien.png'),
    ('Anomalie', 'public/img/unitclass/anomalie.png');


-- INSERT PERSONNAGES
INSERT INTO personnage (name, element, unitclass, origin, rarity, url_img) VALUES
    ('Anby Demara', 1, 4, 1, 4, 'public/img/character/anby.webp'),
    ('Billy Kid', 5, 1, 1, 4, 'public/img/character/billy.webp'),
    ('Nicole Demara', 2, 3, 1, 4, 'public/img/character/nicole.webp'),
    ('Nekomata', 5, 1, 1, 5, 'public/img/character/nekoma.webp'),
    ('Koleda Belobog', 3, 2, 2, 5, 'public/img/character/koleda.webp'),
    ('Ben Bigger', 3, 2, 2, 4, 'public/img/character/ben.webp'),
    ('Grace Howard', 1, 4, 2, 5, 'public/img/character/grace.webp'),
    ('Anton Ivanov', 1, 1, 2, 4, 'public/img/character/anton.webp'),
    ('Lycaon', 4, 1, 3, 5, 'public/img/character/lycaon.webp'),
    ('Ellen Joe', 4, 1, 3, 5, 'public/img/character/ellen.webp'),
    ('Rina', 1, 3, 3, 5, 'public/img/character/rina.webp'),
    ('Soukaku', 4, 3, 4, 4, 'public/img/character/souka.webp'),
    ('Soldier 11', 3, 1, 4, 5, 'public/img/character/soldier11.webp'),
    ('Zhu Yuan', 2, 1, 4, 5, 'public/img/character/zhu.webp'),
    ('Lucy', 3, 3, 5, 5, 'public/img/character/lucy.webp'),
    ('Piper Wheel', 2, 3, 5, 4, 'public/img/character/piper.webp'),
    ('Seth Lowell', 5, 2, 5, 4, 'public/img/character/seth.webp');

