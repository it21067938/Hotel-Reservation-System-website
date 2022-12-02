----User Table Create----
CREATE TABLE User_(
	u_ID char(5) NOT NULL,
	u_NIC char(12) NOT NULL,
	u_f_name varchar(50),
	u_l_name varchar(50),
	u_email varchar(50),
	u_address varchar(255),
	u_dob date,
	u_role varchar(20),

	constraint user_PK primary key(u_ID),
	constraint Uu_IDChk check(u_ID like '[u/U][0-9][0-9][0-9][0-9]'),
);

----Offer Table Create----
CREATE TABLE Offer(
	o_ID char(5) NOT NULL,
	o_startDate date,
	o_expDate date,
	o_description varchar(255),

	constraint offer_PK primary key(o_ID),
	constraint o_IDChk check(o_ID like '[o/O][0-9][0-9][0-9][0-9]'),
);

----Event Table Create----
CREATE TABLE Event(
	e_ID char(5) NOT NULL,
	e_type varchar(50),
	e_price float(2), 

	constraint event_PK primary key(e_ID),
	constraint e_IDChk check(e_ID like '[e/E][0-9][0-9][0-9][0-9]'),
);

----Hall Table Create----
CREATE TABLE Hall(
	h_No char(2)NOT NULL,
	h_type varchar(50),
	h_size varchar(20), 

	constraint hall_PK primary key(h_No),
	constraint h_NoChk check(h_No like '[h/H][0-9]'),
);

----Staff Table Create----
CREATE TABLE Staff(
	s_ID char(5) NOT NULL,
	s_role varchar(20),
	s_fname varchar(50), 
	s_lname varchar(50),
	s_email varchar(50),
	s_address varchar(255),

	constraint staff_PK primary key(s_ID),
	constraint s_IDChk check(s_ID like '[s/S][0-9][0-9][0-9][0-9]'),
);

----Reservation Table Create----
CREATE TABLE Reservation(
	reserv_ID char(5) NOT NULL,
	reserv_date date,
	reserv_time time,
	reserv_details varchar(255),
	e_Sdate date,
	e_Edate date,
	s_ID char(5) NOT NULL,
	e_ID char(5) NOT NULL,
	h_No char(2) NOT NULL,
	u_ID char(5) NOT NULL,

	constraint reserv_PK primary key(reserv_ID),
	constraint staff_FK foreign key(s_ID) references Staff(s_ID),
	constraint reserv_e_FK foreign key(e_ID) references Event(e_ID),
	constraint reserv_h_FK foreign key(h_No) references Hall(h_No),
	constraint reserv_u_FK foreign key(u_ID) references User_(u_ID),
	constraint reserv_IDChk check(reserv_ID like '[r/R][0-9][0-9][0-9][0-9]'),
);

----User_u_contact Table Create----
CREATE TABLE User_u_contact(
	u_ID char(5) NOT NULL,
	u_contact char(10),

	constraint ucontact_PK primary key(u_contact),
	constraint u_FK foreign key(u_ID) references User_(u_ID),
	constraint u_contactCk check(u_contact like '[0][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
);

----Staff_s_contact Table Create----
CREATE TABLE Staff_s_contact(
	s_ID char(5) NOT NULL,
	s_contact char(10),

	constraint scontact_PK primary key(s_contact),
	constraint scontact_FK foreign key(s_ID) references Staff(s_ID),
	constraint s_contactCk check(s_contact like '[0][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
);

----Login Table Create----
CREATE TABLE Login(
	s_loginID char(5) NOT NULL,
	s_ID char(5) NOT NULL,
	s_name varchar(50),
	s_psw varchar(50),

	constraint login_PK primary key(s_loginID),
	constraint login_FK foreign key(s_ID) references Staff(s_ID),
	constraint login_s_IDChk check(s_loginID like '[l/L][0-9][0-9][0-9][0-9]'),
);

----Offers Table Create----
CREATE TABLE Offers(
	o_ID char(5),
	reserv_ID char(5) NOT NULL,

	constraint offers_o_FK foreign key(o_ID) references Offer(o_ID),
	constraint offers_r_FK foreign key(reserv_ID) references Reservation(reserv_ID),
);

----Feedback Table Create----
CREATE TABLE Feedback(
	f_ID char(5) NOT NULL,
	s_ID char(5) NOT NULL,
	u_ID char(5) NOT NULL,
	email varchar(50),
	c_mnt text,
	u_name char(50),
	rating int,
	cmnt_reply text,

	constraint feedback_PK primary key(f_ID),
	constraint feedback_s_FK foreign key(s_ID) references Staff(s_ID),
	constraint feedback_u_FK foreign key(u_ID) references User_(u_ID),
	constraint ratingChk check(rating like '[0-5]'),
);

----Payment Table Create----
CREATE TABLE Payment(
	p_ID char(5) NOT NULL,
	reserv_ID char(5) NOT NULL,
	p_type varchar(20),
	p_amount float(2),
	s_ID char(5) NOT NULL,
	u_ID char(5) NOT NULL,

	constraint payment_PK primary key(p_ID),
	constraint payment_r_FK foreign key(reserv_ID) references Reservation(reserv_ID),
	constraint payment_s_FK foreign key(s_ID) references Staff(s_ID),
	constraint payment_u_FK foreign key(u_ID) references User_(u_ID),
	constraint payment_p_IDChk check(p_ID like '[p/P][0-9][0-9][0-9][0-9]'),
);
