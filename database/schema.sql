drop table if exists oauth_clients;
drop table if exists oauth_access_tokens;
drop table if exists oauth_authorization_codes;
drop table if exists oauth_refresh_tokens;
drop table if exists oauth_users;
drop table if exists oauth_scopes;
drop table if exists oauth_jwt;

create table oauth_clients (
   client_id varchar(80) not null,
   client_secret varchar(80),
   redirect_uri varchar(2000) not null,
   grant_types varchar(80),
   scope varchar(100),
   user_id varchar(80),
   constraint client_id_pk primary key (client_id)
);

create table oauth_access_tokens (
   access_token varchar(40) not null,
   client_id varchar(80) not null,
   user_id varchar(255),
   expires timestamp not null,
   scope varchar(2000),
   constraint access_token_pk primary key (access_token)
);

create table oauth_authorization_codes (
   authorization_code varchar(40) not null,
   client_id varchar(80) not null,
   user_id varchar(255),
   redirect_uri varchar(2000),
   expires timestamp not null,
   scope varchar(2000),
   constraint authorization_code_pk primary key (authorization_code)
);

create table oauth_refresh_tokens (
   refresh_token varchar(40) not null,
   client_id varchar(80) not null,
   user_id varchar(255),
   expires timestamp not null,
   scope varchar(2000),
   constraint refresh_token_pk primary key (refresh_token)
);

create table oauth_users (
   username varchar(255) not null,
   password varchar(2000),
   first_name varchar(255),
   last_name varchar(255),
   constraint username_pk primary key (username)
);

create table oauth_scopes (
   scope text,
   is_default boolean
);

create table oauth_jwt (
   client_id varchar(80) not null,
   subject varchar(80),
   public_key varchar(2000),
   constraint client_id_pk primary key (client_id)
);
