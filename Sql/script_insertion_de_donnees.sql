USE ZenlessZoneZero;

-- INSERT ELEMENTS
INSERT INTO element (name, color, url_img) VALUES
    ('Electric', '#33B6FE', 'https://img.game8.co/3909774/026e32416697e79e563d252cc7227e7e.png/show'),
    ('Ether', '#FE427E', 'https://zzz.senpailife.com/wp-content/uploads/2024/07/ZZZ-Asset-Icon-Attribute-Ether-03.webp'),
    ('Fire', '#FF5623', 'https://zzz.senpailife.com/wp-content/uploads/2023/11/ZZZ-Asset-Icon-Attribute-Fire-01-1-768x768.webp'),
    ('Ice', '#1DAFAD', 'https://zzz.senpailife.com/wp-content/uploads/2023/11/ZZZ-Asset-Icon-Attribute-Ice-01-768x768.webp'),
    ('Physical', '#EDCC2C', 'https://zzz.senpailife.com/wp-content/uploads/2023/11/ZZZ-Asset-Icon-Attribute-Physical-01-768x768.webp');


-- INSERT ORIGINS
INSERT INTO origin (name, url_img) VALUES
    ('Cunning Hares', 'https://static.tvtropes.org/pmwiki/pub/images/5196e6764e97e7ddd59cd947afcd8141_955191389344616215.png'),
    ('Belobog Heavy Industries', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/6/66/Faction_Belobog_Heavy_Industries_Icon.png/revision/latest/thumbnail/width/360/height/360?cb=20240915104643'),
    ('Victoria Housekeeping', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/a/a4/Faction_Victoria_Housekeeping_Co._Icon.png/revision/latest?cb=20240915104752'),
    ('Hollow Special Operations Section 6', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/d/dd/Faction_Hollow_Special_Operations_Section_6_Icon.png/revision/latest?cb=20240628053143'),
    ('OBSIDIAN', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/4/49/Faction_Obsidian_Division_Icon.png/revision/latest?cb=20250706114919');


-- INSERT UNITCLASSES
INSERT INTO unitclass (name, url_img) VALUES
    ('Attaque', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/3/30/Icon_Attack.png/revision/latest/thumbnail/width/360/height/360?cb=20240704113633'),
    ('Défense', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/f/fb/Icon_Defense.png/revision/latest/thumbnail/width/360/height/360?cb=20240704113713'),
    ('Soutien', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/2/2f/Icon_Support.png/revision/latest/thumbnail/width/360/height/360?cb=20240704113754'),
    ('Anomalie', 'https://static.wikia.nocookie.net/zenless-zone-zero/images/d/d2/Icon_Anomaly.png/revision/latest/thumbnail/width/360/height/360?cb=20240704113735');


-- INSERT PERSONNAGES
INSERT INTO personnage (name, element, unitclass, origin, rarity, url_img) VALUES
    ('Anby Demara', 1, 4, 1, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_anby.png'),
    ('Billy Kid', 5, 1, 1, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_billy.png'),
    ('Nicole Demara', 2, 3, 1, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_nicole.png'),
    ('Nekomata', 5, 1, 1, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_nekomata.png'),
    ('Koleda Belobog', 3, 2, 2, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_koleda.png'),
    ('Ben Bigger', 3, 2, 2, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_ben.png'),
    ('Grace Howard', 1, 4, 2, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_grace.png'),
    ('Anton Ivanov', 1, 1, 2, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_anton.png'),
    ('Lycaon', 4, 1, 3, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_lycaon.png'),
    ('Ellen Joe', 4, 1, 3, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_ellen.png'),
    ('Rina', 1, 3, 3, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_rina.png'),
    ('Soukaku', 4, 3, 4, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_soukaku.png'),
    ('Soldier 11', 3, 1, 4, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_soldier_11.png'),
    ('Zhu Yuan', 2, 1, 4, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_zhu_yuann.png'),
    ('Lucy', 3, 3, 5, 5, 'https://sunderarmor.com/ZZZ/Character/thumb_lucy.png'),
    ('Piper Wheel', 2, 3, 5, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_piper.png'),
    ('Seth Lowell', 5, 2, 5, 4, 'https://sunderarmor.com/ZZZ/Character/thumb_seth.png');

