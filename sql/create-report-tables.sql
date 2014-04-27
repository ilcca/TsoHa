DROP TABLE reporttoppages;
DROP TABLE reportevents;
DROP TABLE reportbrowsers;

CREATE TABLE reporttoppages (
   RID SERIAL PRIMARY KEY,
   UID TEXT NOT NULL,
   GROUPBY     TEXT    NOT NULL,
   ORDERBY   TEXT    NOT NULL,
   ORDERDIR   TEXT    NOT NULL,
   STARTTIME   TIMESTAMP NOT NULL,
   ENDTIME   TIMESTAMP NOT NULL,
   FILTERURL   TEXT    NOT NULL,
   FILTERTITLE   TEXT    NOT NULL,
   SEGMENTTITLE   TEXT    NOT NULL
);
CREATE TABLE reportevents (
   RID SERIAL PRIMARY KEY,
   UID TEXT NOT NULL,
   STARTTIME   TIMESTAMP NOT NULL,
   ENDTIME   TIMESTAMP NOT NULL
);
CREATE TABLE reportbrowsers (
   RID SERIAL PRIMARY KEY,
   UID TEXT NOT NULL,
   STARTTIME   TIMESTAMP NOT NULL,
   ENDTIME   TIMESTAMP NOT NULL
);

INSERT INTO reporttoppages (UID,GROUPBY,ORDERBY,ORDERDIR,STARTTIME,ENDTIME,FILTERURL,FILTERTITLE,SEGMENTTITLE) VALUES ('ilkka', 'title', 'sivulataukset', 'DESC', '2014-04-24 00:00:00', '2014-05-01 00:00:00', '%', '%', '%');
INSERT INTO reporttoppages (UID,GROUPBY,ORDERBY,ORDERDIR,STARTTIME,ENDTIME,FILTERURL,FILTERTITLE,SEGMENTTITLE) VALUES ('ilkka', 'title', 'selaimet', 'DESC', '2014-04-24 00:00:00', '2014-05-01 00:00:00', '%', '%', '%');
INSERT INTO reportbrowsers (UID,STARTTIME,ENDTIME) VALUES ('ilkka', '2014-04-24 00:00:00', '2014-05-01 00:00:00');
INSERT INTO reportevents (UID,STARTTIME,ENDTIME) VALUES ('ilkka', '2014-04-24 00:00:00', '2014-05-01 00:00:00');
