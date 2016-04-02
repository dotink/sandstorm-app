UPDATE action_types SET name = 'Work a Table' WHERE name = 'Tabling';
UPDATE action_types SET name = 'Call Voters' WHERE name = 'Phoning';
UPDATE action_types SET name = 'Knock on Doors' WHERE name = 'Walking';
UPDATE action_types SET name = 'Produce Media' WHERE name = 'Media';
UPDATE action_types SET name = 'Hold a Meeting' WHERE name = 'Events';

INSERT INTO action_types (name) VALUES ('Write Letters');
INSERT INTO action_types (name) VALUES ('Do Data Entry');
INSERT INTO action_types (name) VALUES ('Register Voters');
INSERT INTO action_types (name) VALUES ('Organize Rallies');

DELETE FROM action_types WHERE name = 'Other';
