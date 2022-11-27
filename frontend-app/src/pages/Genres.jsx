import { useRef, useState, useEffect } from "react";
import GenreListItem from "../components/GenreListItem";

const Genres = () => {
    const dataGenre = useRef(false);
    const [genres, setGenres] = useState([]);
    const [status, setStatus] = useState('load');

    useEffect(() => {
        if (dataGenre.current) {
            return;
        }
        dataGenre.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/genres`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error!')
                }
                return response.json()
            })
            .then(json => { setGenres(json.data); setStatus('success'); })
            .catch(() => setStatus('error'));

    }, []);

    if (status === 'load') {
        return <h1>Loading...</h1>
    }

    if (status === 'error') {
        return <h1>Loading Error!</h1>
    }

    return (
        <div className="row mt-4">
            <div className="col-md-8">
                {genres.map(genre =>
                    <GenreListItem
                        id={genre.id}
                        key={genre.id}
                        title={genre.title} />
                )}
            </div>
        </div>
    );
};

export default Genres;