PGDMP                         u           store    9.5.6    9.5.6 o    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           1262    17344    store    DATABASE     w   CREATE DATABASE store WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_UA.UTF-8' LC_CTYPE = 'ru_UA.UTF-8';
    DROP DATABASE store;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    7            �           0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    7                        3079    12397    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    17345 
   parameters    TABLE     �   CREATE TABLE parameters (
    id integer NOT NULL,
    title character varying(100),
    unit character varying(255) DEFAULT NULL::character varying
);
    DROP TABLE public.parameters;
       public         postgres    false    7            �            1259    17348    attributes_id_seq    SEQUENCE     s   CREATE SEQUENCE attributes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.attributes_id_seq;
       public       postgres    false    7    181             	           0    0    attributes_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE attributes_id_seq OWNED BY parameters.id;
            public       postgres    false    182            �            1259    17350    basket    TABLE     �   CREATE TABLE basket (
    id integer NOT NULL,
    order_id integer,
    product_id integer,
    amount integer,
    price_product money
);
    DROP TABLE public.basket;
       public         postgres    false    7            �            1259    17353    basket_id_seq    SEQUENCE     o   CREATE SEQUENCE basket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.basket_id_seq;
       public       postgres    false    183    7            	           0    0    basket_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE basket_id_seq OWNED BY basket.id;
            public       postgres    false    184            �            1259    17355 
   categories    TABLE     �   CREATE TABLE categories (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    parent_id integer,
    url character varying(150),
    preview text
);
    DROP TABLE public.categories;
       public         postgres    false    7            �            1259    17358    categories_id_seq    SEQUENCE     s   CREATE SEQUENCE categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categories_id_seq;
       public       postgres    false    185    7            	           0    0    categories_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE categories_id_seq OWNED BY categories.id;
            public       postgres    false    186            �            1259    17360    creditcards    TABLE     i   CREATE TABLE creditcards (
    id integer NOT NULL,
    card_number integer,
    expiration_date date
);
    DROP TABLE public.creditcards;
       public         postgres    false    7            �            1259    17363    creditcards_id_seq    SEQUENCE     t   CREATE SEQUENCE creditcards_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.creditcards_id_seq;
       public       postgres    false    187    7            	           0    0    creditcards_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE creditcards_id_seq OWNED BY creditcards.id;
            public       postgres    false    188            �            1259    17365    users    TABLE     �  CREATE TABLE users (
    id integer NOT NULL,
    name character varying(100),
    login character varying(100),
    password character varying(100),
    "group" character varying(100),
    discount real,
    phone character varying(50),
    email character varying(100),
    address text,
    creditcard_id integer,
    token character varying(100),
    roles character varying(150)
);
    DROP TABLE public.users;
       public         postgres    false    7            �            1259    17371    customers_id_seq    SEQUENCE     r   CREATE SEQUENCE customers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.customers_id_seq;
       public       postgres    false    7    189            	           0    0    customers_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE customers_id_seq OWNED BY users.id;
            public       postgres    false    190            �            1259    17373 
   deliveries    TABLE     �   CREATE TABLE deliveries (
    id integer NOT NULL,
    delivery_date date,
    weight double precision,
    volume double precision,
    delivery_price money,
    status character varying(100)
);
    DROP TABLE public.deliveries;
       public         postgres    false    7            �            1259    17376    deliveries_id_seq    SEQUENCE     s   CREATE SEQUENCE deliveries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.deliveries_id_seq;
       public       postgres    false    7    191            	           0    0    deliveries_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE deliveries_id_seq OWNED BY deliveries.id;
            public       postgres    false    192            �            1259    17378    orders    TABLE     #  CREATE TABLE orders (
    id integer NOT NULL,
    staff_id integer,
    delivery_id integer,
    user_id integer,
    price numeric(10,2),
    delivery_method character varying(100),
    payment_method character varying(100),
    status character varying(100),
    time_date date,
    comment text,
    order_id integer,
    product_id integer,
    amount integer,
    name character varying(255),
    address text,
    phone character varying(50),
    created_at timestamp without time zone DEFAULT ('now'::text)::timestamp(0) with time zone
);
    DROP TABLE public.orders;
       public         postgres    false    7            �            1259    17384    orders_id_seq    SEQUENCE     o   CREATE SEQUENCE orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.orders_id_seq;
       public       postgres    false    193    7            	           0    0    orders_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE orders_id_seq OWNED BY orders.id;
            public       postgres    false    194            �            1259    17386    pages    TABLE     �   CREATE TABLE pages (
    id integer NOT NULL,
    title character varying(50),
    content text,
    url character varying(150)
);
    DROP TABLE public.pages;
       public         postgres    false    7            �            1259    17392    pages_id_seq    SEQUENCE     n   CREATE SEQUENCE pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.pages_id_seq;
       public       postgres    false    195    7            	           0    0    pages_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE pages_id_seq OWNED BY pages.id;
            public       postgres    false    196            �            1259    17394    parameters_values    TABLE     �   CREATE TABLE parameters_values (
    id integer NOT NULL,
    parameters_id integer,
    products_id integer,
    text text,
    number double precision,
    date date,
    value character varying(255)
);
 %   DROP TABLE public.parameters_values;
       public         postgres    false    7            �            1259    17400    photogallery    TABLE     y   CREATE TABLE photogallery (
    id integer NOT NULL,
    name character varying(100),
    path character varying(150)
);
     DROP TABLE public.photogallery;
       public         postgres    false    7            �            1259    17403    photogallery_id_seq    SEQUENCE     u   CREATE SEQUENCE photogallery_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.photogallery_id_seq;
       public       postgres    false    198    7            	           0    0    photogallery_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE photogallery_id_seq OWNED BY photogallery.id;
            public       postgres    false    199            �            1259    17405 	   positions    TABLE     g   CREATE TABLE positions (
    id integer NOT NULL,
    title character varying(100),
    notice text
);
    DROP TABLE public.positions;
       public         postgres    false    7            �            1259    17411    positions_id_seq    SEQUENCE     r   CREATE SEQUENCE positions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.positions_id_seq;
       public       postgres    false    7    200            		           0    0    positions_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE positions_id_seq OWNED BY positions.id;
            public       postgres    false    201            �            1259    17413    products    TABLE     �  CREATE TABLE products (
    id integer NOT NULL,
    title character varying(100),
    description text,
    category_id integer,
    gallery_id integer,
    storage character varying(100),
    preview text,
    price numeric(20,2),
    selected boolean DEFAULT false,
    created_at timestamp without time zone DEFAULT ('now'::text)::timestamp(0) with time zone,
    updated_at timestamp without time zone DEFAULT ('now'::text)::timestamp(0) with time zone,
    article character varying(25)
);
    DROP TABLE public.products;
       public         postgres    false    7            �            1259    17420    products_id_seq    SEQUENCE     q   CREATE SEQUENCE products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public       postgres    false    7    202            
	           0    0    products_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE products_id_seq OWNED BY products.id;
            public       postgres    false    203            �            1259    17422    staffs    TABLE     �   CREATE TABLE staffs (
    id integer NOT NULL,
    name character varying(100),
    position_id integer,
    email character varying(100),
    phone integer
);
    DROP TABLE public.staffs;
       public         postgres    false    7            �            1259    17425    staffs_id_seq    SEQUENCE     o   CREATE SEQUENCE staffs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.staffs_id_seq;
       public       postgres    false    204    7            	           0    0    staffs_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE staffs_id_seq OWNED BY staffs.id;
            public       postgres    false    205            �            1259    17427    values_id_seq    SEQUENCE     o   CREATE SEQUENCE values_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.values_id_seq;
       public       postgres    false    7    197            	           0    0    values_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE values_id_seq OWNED BY parameters_values.id;
            public       postgres    false    206            6           2604    17429    id    DEFAULT     X   ALTER TABLE ONLY basket ALTER COLUMN id SET DEFAULT nextval('basket_id_seq'::regclass);
 8   ALTER TABLE public.basket ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    184    183            7           2604    17430    id    DEFAULT     `   ALTER TABLE ONLY categories ALTER COLUMN id SET DEFAULT nextval('categories_id_seq'::regclass);
 <   ALTER TABLE public.categories ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    186    185            8           2604    17431    id    DEFAULT     b   ALTER TABLE ONLY creditcards ALTER COLUMN id SET DEFAULT nextval('creditcards_id_seq'::regclass);
 =   ALTER TABLE public.creditcards ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    188    187            :           2604    17432    id    DEFAULT     `   ALTER TABLE ONLY deliveries ALTER COLUMN id SET DEFAULT nextval('deliveries_id_seq'::regclass);
 <   ALTER TABLE public.deliveries ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    192    191            ;           2604    17433    id    DEFAULT     X   ALTER TABLE ONLY orders ALTER COLUMN id SET DEFAULT nextval('orders_id_seq'::regclass);
 8   ALTER TABLE public.orders ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    194    193            =           2604    17434    id    DEFAULT     V   ALTER TABLE ONLY pages ALTER COLUMN id SET DEFAULT nextval('pages_id_seq'::regclass);
 7   ALTER TABLE public.pages ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    196    195            4           2604    17435    id    DEFAULT     `   ALTER TABLE ONLY parameters ALTER COLUMN id SET DEFAULT nextval('attributes_id_seq'::regclass);
 <   ALTER TABLE public.parameters ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    182    181            >           2604    17436    id    DEFAULT     c   ALTER TABLE ONLY parameters_values ALTER COLUMN id SET DEFAULT nextval('values_id_seq'::regclass);
 C   ALTER TABLE public.parameters_values ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    197            ?           2604    17437    id    DEFAULT     d   ALTER TABLE ONLY photogallery ALTER COLUMN id SET DEFAULT nextval('photogallery_id_seq'::regclass);
 >   ALTER TABLE public.photogallery ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198            @           2604    17438    id    DEFAULT     ^   ALTER TABLE ONLY positions ALTER COLUMN id SET DEFAULT nextval('positions_id_seq'::regclass);
 ;   ALTER TABLE public.positions ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200            B           2604    17439    id    DEFAULT     \   ALTER TABLE ONLY products ALTER COLUMN id SET DEFAULT nextval('products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    202            E           2604    17440    id    DEFAULT     X   ALTER TABLE ONLY staffs ALTER COLUMN id SET DEFAULT nextval('staffs_id_seq'::regclass);
 8   ALTER TABLE public.staffs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    204            9           2604    17441    id    DEFAULT     Z   ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('customers_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    190    189            	           0    0    attributes_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('attributes_id_seq', 27, true);
            public       postgres    false    182            �          0    17350    basket 
   TABLE DATA               J   COPY basket (id, order_id, product_id, amount, price_product) FROM stdin;
    public       postgres    false    183   �w       	           0    0    basket_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('basket_id_seq', 1, false);
            public       postgres    false    184            �          0    17355 
   categories 
   TABLE DATA               @   COPY categories (id, name, parent_id, url, preview) FROM stdin;
    public       postgres    false    185   �w       	           0    0    categories_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('categories_id_seq', 61, true);
            public       postgres    false    186            �          0    17360    creditcards 
   TABLE DATA               @   COPY creditcards (id, card_number, expiration_date) FROM stdin;
    public       postgres    false    187   �y       	           0    0    creditcards_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('creditcards_id_seq', 1, false);
            public       postgres    false    188            	           0    0    customers_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('customers_id_seq', 7, true);
            public       postgres    false    190            �          0    17373 
   deliveries 
   TABLE DATA               X   COPY deliveries (id, delivery_date, weight, volume, delivery_price, status) FROM stdin;
    public       postgres    false    191   z       	           0    0    deliveries_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('deliveries_id_seq', 1, false);
            public       postgres    false    192            �          0    17378    orders 
   TABLE DATA               �   COPY orders (id, staff_id, delivery_id, user_id, price, delivery_method, payment_method, status, time_date, comment, order_id, product_id, amount, name, address, phone, created_at) FROM stdin;
    public       postgres    false    193   %z       	           0    0    orders_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('orders_id_seq', 212, true);
            public       postgres    false    194            �          0    17386    pages 
   TABLE DATA               1   COPY pages (id, title, content, url) FROM stdin;
    public       postgres    false    195   �z       	           0    0    pages_id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('pages_id_seq', 1, false);
            public       postgres    false    196            �          0    17345 
   parameters 
   TABLE DATA               .   COPY parameters (id, title, unit) FROM stdin;
    public       postgres    false    181   �z       �          0    17394    parameters_values 
   TABLE DATA               _   COPY parameters_values (id, parameters_id, products_id, text, number, date, value) FROM stdin;
    public       postgres    false    197   �{       �          0    17400    photogallery 
   TABLE DATA               /   COPY photogallery (id, name, path) FROM stdin;
    public       postgres    false    198   |~       	           0    0    photogallery_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('photogallery_id_seq', 1, false);
            public       postgres    false    199            �          0    17405 	   positions 
   TABLE DATA               /   COPY positions (id, title, notice) FROM stdin;
    public       postgres    false    200   �~       	           0    0    positions_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('positions_id_seq', 1, false);
            public       postgres    false    201            �          0    17413    products 
   TABLE DATA               �   COPY products (id, title, description, category_id, gallery_id, storage, preview, price, selected, created_at, updated_at, article) FROM stdin;
    public       postgres    false    202   �~       	           0    0    products_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('products_id_seq', 75, true);
            public       postgres    false    203            �          0    17422    staffs 
   TABLE DATA               >   COPY staffs (id, name, position_id, email, phone) FROM stdin;
    public       postgres    false    204   :�       	           0    0    staffs_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('staffs_id_seq', 1, false);
            public       postgres    false    205            �          0    17365    users 
   TABLE DATA               z   COPY users (id, name, login, password, "group", discount, phone, email, address, creditcard_id, token, roles) FROM stdin;
    public       postgres    false    189   W�       	           0    0    values_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('values_id_seq', 309, true);
            public       postgres    false    206            G           2606    17443    attributes_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY parameters
    ADD CONSTRAINT attributes_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.parameters DROP CONSTRAINT attributes_pkey;
       public         postgres    false    181    181            I           2606    17445    basket_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.basket DROP CONSTRAINT basket_pkey;
       public         postgres    false    183    183            K           2606    17447    categories_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public         postgres    false    185    185            M           2606    17449    creditcards_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY creditcards
    ADD CONSTRAINT creditcards_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.creditcards DROP CONSTRAINT creditcards_pkey;
       public         postgres    false    187    187            O           2606    17451    customers_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY users
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.users DROP CONSTRAINT customers_pkey;
       public         postgres    false    189    189            Q           2606    17453    deliveries_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY deliveries
    ADD CONSTRAINT deliveries_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.deliveries DROP CONSTRAINT deliveries_pkey;
       public         postgres    false    191    191            S           2606    17455    orders_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_pkey;
       public         postgres    false    193    193            U           2606    17457 
   pages_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.pages DROP CONSTRAINT pages_pkey;
       public         postgres    false    195    195            Y           2606    17459    photogallery_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY photogallery
    ADD CONSTRAINT photogallery_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.photogallery DROP CONSTRAINT photogallery_pkey;
       public         postgres    false    198    198            [           2606    17461    positions_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY positions
    ADD CONSTRAINT positions_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.positions DROP CONSTRAINT positions_pkey;
       public         postgres    false    200    200            ]           2606    17463    products_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public         postgres    false    202    202            _           2606    17465    staffs_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY staffs
    ADD CONSTRAINT staffs_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_pkey;
       public         postgres    false    204    204            W           2606    17467    values_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY parameters_values
    ADD CONSTRAINT values_pkey PRIMARY KEY (id);
 G   ALTER TABLE ONLY public.parameters_values DROP CONSTRAINT values_pkey;
       public         postgres    false    197    197            `           2606    17468    basket_order_id_fkey    FK CONSTRAINT     n   ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_order_id_fkey FOREIGN KEY (order_id) REFERENCES orders(id);
 E   ALTER TABLE ONLY public.basket DROP CONSTRAINT basket_order_id_fkey;
       public       postgres    false    2131    193    183            a           2606    17473    basket_product_id_fkey    FK CONSTRAINT     t   ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_product_id_fkey FOREIGN KEY (product_id) REFERENCES products(id);
 G   ALTER TABLE ONLY public.basket DROP CONSTRAINT basket_product_id_fkey;
       public       postgres    false    2141    202    183            b           2606    17609    categories_parent_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE CASCADE;
 N   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_parent_id_fkey;
       public       postgres    false    2123    185    185            d           2606    17483    orders_delivery_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_delivery_id_fkey FOREIGN KEY (delivery_id) REFERENCES deliveries(id);
 H   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_delivery_id_fkey;
       public       postgres    false    191    2129    193            e           2606    17488    orders_staff_id_fkey    FK CONSTRAINT     n   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_staff_id_fkey FOREIGN KEY (staff_id) REFERENCES staffs(id);
 E   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_staff_id_fkey;
       public       postgres    false    193    204    2143            f           2606    17493    orders_user_id_fkey    FK CONSTRAINT     k   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);
 D   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_user_id_fkey;
       public       postgres    false    193    2127    189            g           2606    17498 $   parameters_values_parameters_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY parameters_values
    ADD CONSTRAINT parameters_values_parameters_id_fkey FOREIGN KEY (parameters_id) REFERENCES parameters(id);
 `   ALTER TABLE ONLY public.parameters_values DROP CONSTRAINT parameters_values_parameters_id_fkey;
       public       postgres    false    2119    197    181            h           2606    17561 "   parameters_values_products_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY parameters_values
    ADD CONSTRAINT parameters_values_products_id_fkey FOREIGN KEY (products_id) REFERENCES products(id) ON DELETE CASCADE;
 ^   ALTER TABLE ONLY public.parameters_values DROP CONSTRAINT parameters_values_products_id_fkey;
       public       postgres    false    197    2141    202            j           2606    17604    products_category_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY products
    ADD CONSTRAINT products_category_id_fkey FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE;
 L   ALTER TABLE ONLY public.products DROP CONSTRAINT products_category_id_fkey;
       public       postgres    false    202    185    2123            i           2606    17513    products_gallery_id_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY products
    ADD CONSTRAINT products_gallery_id_fkey FOREIGN KEY (gallery_id) REFERENCES photogallery(id);
 K   ALTER TABLE ONLY public.products DROP CONSTRAINT products_gallery_id_fkey;
       public       postgres    false    2137    198    202            k           2606    17518    staffs_position_id_fkey    FK CONSTRAINT     w   ALTER TABLE ONLY staffs
    ADD CONSTRAINT staffs_position_id_fkey FOREIGN KEY (position_id) REFERENCES positions(id);
 H   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_position_id_fkey;
       public       postgres    false    204    200    2139            c           2606    17523    users_creditcard_id_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY users
    ADD CONSTRAINT users_creditcard_id_fkey FOREIGN KEY (creditcard_id) REFERENCES creditcards(id);
 H   ALTER TABLE ONLY public.users DROP CONSTRAINT users_creditcard_id_fkey;
       public       postgres    false    189    2125    187            �      x������ � �      �      x�]�ˎ�0���S�(�$v�+���kgi�I+��t�ݠA\V�X��@+JK�+��E�H�e����?<"�N~�oakr���\�0�\�ue��'Q�������p�_��?`���]�^�W�[�y�ӌY&uNyL�����_�A�G����͝逩`��#�
�����!�j^�{Z�F���r����-��#2�@Ԯ�/�eգ$��2�Sﰠ=�1ǹ(�*5�U$�eFD��,�l!��ʥ�)�YɰiI�=*����r�WZ�Be��>�4W�'z؅:*U7�v1.;X�L�\*�����9�}���N�Tu�1Kb����ԯa3�� [���E��VfX�Up��ώl�cC��s=�	v 5��v��E�Z2UP����_�ί���`;�=���� �'�s��!�K0�+�z��a5��X�f1nU7���a	��ǳ�;�\�i�Ӌ<S��h�O8����>����Vn2k��.o�X̥̕�\��n��	wWU����˧���hR�      �      x������ � �      �      x������ � �      �   L   x�324��"c#=K�,8͌89s�J9�����������܂����\��L��B�������Ԑ+F��� W�      �      x������ � �      �   #  x�}PKN�0]�O��ƥ.�	z�$H (R$�
���`mQC��l�,XX3�7���s��h��չ���أg%��FԺƇ��9�'ብ-I5�;Z-Ѡ�[�N�#41��6*���M=<��x��$���^1���l��d�=5~���Nw�f��SqTG�qM� o�^��V���ӿ=\�"z&x�e�"N�ĸٿ;���k:.�tƹ$Sp-*�G'���Z���H����-�����#Z�$^hE3m{��9&����KG�Ў�۔Ց1���&M      �   �  x��S�jA<�|E_�5LwO����_�KN���	1�DsP��ă'aQ'l6��_x�G��M�k� ��P����z5.��5U����۟|�Ez-3��Jf���CY1���N�����Sd���~�\~�ϕ�e4r��#�h�+�=����0T6` +
й�u�:��ut�r���ܓ� .�(������6��7�FE=O���fC�-i��7��Hk����4Moi�4uH�BW�����G��=�L�G�S.Eih�Bѡ��^���s\Rz	�P����+�!�>�*m
� u�t$�h�(���W�Z��T��}�}O�md�C��������o3n�;�[�XiWu*[�W,Pk;��X��#��P��"+��"�<�ȶ���d��]�#�r�}�K>�d!�d}�֭��!&M�5:�q�,[nWYWr�-�%Nq/�/�7�E�|=H=���Z�o�]�}�j| ����V����΋��;�vQg)Cם�oe��qk���<�gׄ������tb�'^N�>���?B��)""|��|��la�%��u�_�M�tݮ��Ĵ�#�0�z��@��=���Ыc6t����Դ�[��ɜ-���?9v=�*���èಞ�З�k�|3p-���ւp�s:�^��V]�7�כ�      �      x������ � �      �      x������ � �      �   t  x��ZKo�>�������y����8HĈ;G]�t�D�!r㒢e���G�~H$�2��}�/���%����wvv��$`loOOwu=���zߩ�V�j^�|q@�V�[����d��������[ms��]�*�f�C�~��Ϋ��=[�TS��������F<TV��d�ҏ�Ҳ�ڜ�&��`��	M��?��K��D�s㷎;�ݼ������Y��a�奩��iԍ|�C'��ަ�П�{}��GI������������_�I�������N��g6������w��yv�x�O]Zԣ�=��	�Ɤ#:��ӱv��ߴ��x���;�M������?<ͭ>�zX��wQ��y?�p��)�SU���������|,:��u�O��s� ���U>���EX���18�2�.L?��#2�G$G�.�6�PҲ#���ʋ���⮜��]�ew�E�	��E��M����c1��'^u�Z50qN� 9u�	-r����hyrT^��cA~7gIq�!<Y�[�z���Hcz�����Y���$�5�+�!yy �F$ʩ�$���4�<��y�Y'���x��!d8�e �!d�]uJ���,��DА7Qc�!� �w٪캋G��4����r��;�����[���G+dN�5��N�8B��$�Y���9�-�����l��S�~܏�~�u)��(3a�9�7���O�öݽ}K�x���Y?�����%�ٗ���.��זt��%VTw�8��Y"q����q1�T�Հ-���	���0__���m4�o�	�,�f��P�w}�Od¶16!���͎9���biq�LACaˑs6�yk+�Ð���i���aЏ���0N:Iϩ�%��8q���9�"`�F�|��O���<��D�'18����F�`�@�ٕH�*� ��u9�K���gKH��T���b�W�R���喈B8vR��s��)�z�c�:l�f
3�M�Ĭ	4�Q2�G�a5�	B'���[=![|�8�`��D-�Ԁ�`eƛ�4ɋ&��3��*�<"�LXo���6��r����d^]��9����.��Թ>'�iϘ�x���7�4�Z��R�s�d0!W��2��o�(�\���0��4y��E�HJ8����(���;G"�C]��z��Dy�>�"9���󼕐KBo���B
�n�4"�8J���1��(&��u�l%�jR/$�h�гS�$�L/��ߗ�Y��� J�$Ҡ�͚���o"��K���^^�J���A!LV��Hu�8�� yWZ��l��!�z���0$4[�^6C��J݈<�;�F����N2�[К��B��8k�� وgI�7L$$�@�g5�`�LY�MD��?x&VK�ŖaFf�՚��&�j�!������c�C��th<X� Ksn�Pϒ��Q�EPt.Љ_cޛV?[KE��j�lÒ�������Y�%��N��c����E�0tziŝ$v�O�׎�91��WNһ��e���m���$�}/n��e����s��ܩ����
�����s�!PpƎ����<Yα�΋@�K��M�|�;�}3����E�͖e���v�&��&�Q�ֳ�����q���A�T�R
�)�L���B�0_iu61� ����L5�saBZ�Ԃ�4W.:'��.����h����GՇD=UɇrΗG�{nWp0�PE�����0�K[��� Ա+���@{@�y�x�zn�qp \��8�us�_�֧r,���e�e�|�J;7%�1�5�z��RSq�Ql*�b�'����|��>DH�O���X��fJe�ĥ��RĿ���Z��
c�����-t�8g�7X2�\n��oj�9�=��C���`1�h���;I�J�5X���&���4K�����Gvp���EB�|���������|����Ϳ칿ں�羽��5�!bg�LJ)@�mౙLfjũE��XQb� `�֢�\\��$�W���L��CcD�Jָ��PX��̼+�}�s��||���K0��.XF�: �6��h��#AB�䘮�нq��{t ��:���>Op�T��v��r��/}� C�dߔ
�(=�l���Z�喩��(�؏uKWDg�1�%��,���R1�<6����B}&�2H���e������X�3Ê�.���ڪ�P��K�j=��C��X�j%�C|K�:������Q��B�J�Epen۲�.���b��ʆE5��;�ҏ+7���Q���p�ȼ(�I㭠����[I���^��v;a�x���F���������N����4ڣ�/�V�*���$'�ۺ�Q�H^�X��h�JC�Mr�rR4 5���ۥ�.�m[�¤�=�(듼QBL���+�K$���媿k��e�k�.�ӂ�ii���c����
��o���Z��s�NǝIQ������^9�4�M(ED� �.�S�����]6��I4�4E��ۤA�m��@0�Ѝ�K���Ұ����6AL��&���6��.�Ǵ��J=���]8��Mf�h��>�����!lR�g ~�|zƜE���Ԭ�*SBƓ����5 ��݆��f/��qot�*d�>� �j^/�[Z�u�~ngg'�Bog�	�q�N��~��1�p�歄�u��l6�)r�m��?��T��Je�h�Q��O�k�Z��&�����������.+!����^j9p�(�7ԓ�1E�#���Jg��YXg.���ծ8%�J�a/�V@P��4�^��oA�!Oh1H�E��mf�IQn�$i�so.{�N�\Y���)���z3_�{>�B��5�e��l�_D�%�P⮨w0��о�F�0�hz\���ܮ]��n-���1r �6W��ؐ���J���)=���X��_zˠ��FG���c)���w��%�{,$�Υ�QX�{ܔ�����NL�T��S���֕��4��+X���@�A�_�]��@�j�������������%�6ø�k\��>��{����@��(�]��z m7)1��˻���^3���r���79�]�2CV���{up�l��Gq�]���:�\�j��a?������	+�g�`f�Nc�Ѣ�j���ދna]bM-��H[:�ZO�� �ߢ,�7oL�~���1?�����dx��í�o�F��x������[4�����$p$����vϒ�G�馸�����Շ��R��a��E��f+؏��3է[����֝��%>w��S ���2�P����n��kJP-���B��%��P�X�V�O�jl�X{Y�e�|M:�k�ӚVeU���"��T�^��Ş���Q�V��Q�K[Ǩ��<����ծ�۷�۽�V�p�U��r�����[۷�
{�sf{��(�m*��ߚ�.�K{�7���Oa>"k����zW3Rf�LjLը#G𪕖Ψ�-
���'7��8-?c25;�1W�:{N{��X����]E"��ԩ�0O�.e9ڰF(�_��xn�Yܒ�&�A��й2�i�}��Ci<�6�U���b�m(I��̔ސW�VŦ�ų�5�
�"m�R��� �}hxlsY]�?������oJD@�D�].�˔ϐ�$���?3n�ߜIS�!����2gz���_�ƭiu6�"3��������s�%��[>D�KE����1B��#�K-mv(y��5H~�|m�������R�g��ςmL�AUC���0�k1\��������ZST(��V*r�h�_�c����	1m/d�z��[����<��	;�.�	>�*4��61�l�ӽ^������n�ZF#�m����i�!?%�8nK{D�㨓/�����}�[�������o}�l��A�ۻNxݴ�!����1Fq��QԹ��t:�}��      �      x������ � �      �   �   x���1� kx�u��ΑҤ�_��8��d��Ǹv�H��f5Z��Q�e��&��!�����}�.PLmy��\;y��{��O����t�l��d"8�	<��0� hs����y]^
Z,=�#�ɆH�8�)b����1��Z��J�     