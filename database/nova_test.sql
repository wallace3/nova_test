PGDMP     4        
            {        	   nova_test    15.2    15.2     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16398 	   nova_test    DATABASE     |   CREATE DATABASE nova_test WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE nova_test;
                postgres    false            �            1259    16399    products    TABLE     �   CREATE TABLE public.products (
    id integer NOT NULL,
    name text,
    barcode text,
    category text,
    price double precision,
    status integer
);
    DROP TABLE public.products;
       public         heap    postgres    false            �            1259    16406    products_id_seq    SEQUENCE     �   ALTER TABLE public.products ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    214            f           2606    16405    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            postgres    false    214           