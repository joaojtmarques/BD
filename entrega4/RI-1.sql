CREATE OR REPLACE FUNCTION check_zona_func() RETURNS trigger AS $check_zona$
    BEGIN
        
        IF NEW.zona2 IS NULL THEN
            RAISE EXCEPTION 'zona cannot be null';
        END IF;
        

        IF EXISTS(select zona from anomalia where zona = new.zona2)
        THEN
            RAISE EXCEPTION 'Zona da anomalia de traducao não se pode sobrepor a zona da anomalia';
        END IF;

        RETURN NEW;
    END;
$check_zona$ LANGUAGE plpgsql;

CREATE TRIGGER check_zona BEFORE INSERT
    ON anomalia_traducao
    FOR EACH ROW
    EXECUTE PROCEDURE check_zona_func();