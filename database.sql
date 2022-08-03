--
-- PostgreSQL database dump
--

-- Dumped from database version 13.4
-- Dumped by pg_dump version 14.4 (Ubuntu 14.4-0ubuntu0.22.04.1)

-- Started on 2022-08-03 08:41:02 UTC


--
-- TOC entry 203 (class 1259 OID 16583)
-- Name: lists_todo; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.lists_todo (
    list_id integer NOT NULL,
    list_name character varying NOT NULL,
    list_description text,
    created_at timestamp with time zone DEFAULT now() NOT NULL,
    fk_user_id integer NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 16581)
-- Name: lists_todo_list_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.lists_todo ALTER COLUMN list_id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.lists_todo_list_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 205 (class 1259 OID 16600)
-- Name: todo_items; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.todo_items (
    item_id integer NOT NULL,
    item_name character varying NOT NULL,
    item_description text,
    item_progress integer NOT NULL,
    fk_list_id integer NOT NULL
);


--
-- TOC entry 204 (class 1259 OID 16598)
-- Name: todo_items_item_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.todo_items ALTER COLUMN item_id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.todo_items_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 201 (class 1259 OID 16573)
-- Name: user_data; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.user_data (
    user_id integer NOT NULL,
    user_fname character varying NOT NULL,
    user_lname character varying NOT NULL,
    user_email character varying NOT NULL,
    user_pwrd character varying NOT NULL
);


--
-- TOC entry 200 (class 1259 OID 16571)
-- Name: user_data_user_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

ALTER TABLE public.user_data ALTER COLUMN user_id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.user_data_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 3729 (class 2606 OID 16591)
-- Name: lists_todo lists_todo_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lists_todo
    ADD CONSTRAINT lists_todo_pkey PRIMARY KEY (list_id);


--
-- TOC entry 3733 (class 2606 OID 16607)
-- Name: todo_items todo_items_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.todo_items
    ADD CONSTRAINT todo_items_pkey PRIMARY KEY (item_id);


--
-- TOC entry 3726 (class 2606 OID 16580)
-- Name: user_data user_data_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.user_data
    ADD CONSTRAINT user_data_pkey PRIMARY KEY (user_id);


--
-- TOC entry 3730 (class 1259 OID 16615)
-- Name: fki_fk; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk ON public.todo_items USING btree (fk_list_id);


--
-- TOC entry 3731 (class 1259 OID 16621)
-- Name: fki_fk_list__id; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_list__id ON public.todo_items USING btree (fk_list_id);


--
-- TOC entry 3727 (class 1259 OID 16597)
-- Name: fki_fk_user_id; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_user_id ON public.lists_todo USING btree (fk_user_id);


--
-- TOC entry 3734 (class 2606 OID 16592)
-- Name: lists_todo fk_user_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lists_todo
    ADD CONSTRAINT fk_user_id FOREIGN KEY (fk_user_id) REFERENCES public.user_data(user_id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3735 (class 2606 OID 16622)
-- Name: todo_items todo_items_fk_list_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.todo_items
    ADD CONSTRAINT todo_items_fk_list_id_fkey FOREIGN KEY (fk_list_id) REFERENCES public.lists_todo(list_id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


-- Completed on 2022-08-03 08:41:14 UTC

--
-- PostgreSQL database dump complete
--

