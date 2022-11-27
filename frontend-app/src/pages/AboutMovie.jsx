import { useEffect } from "react";
import { useRef, useState } from "react";
import { useParams } from "react-router-dom";

const AboutMovie = () => {
    const { id } = useParams();
    const dataMovie = useRef(false);
    const [movie, setMovie] = useState(null);
    const [status, setStatus] = useState('load');

    useEffect(() => {
        console.log(dataMovie);
        if (dataMovie.current) {
            return;
        }
        dataMovie.current = true;

        const url1 = `${process.env.REACT_APP_API_URL}/api/movies/${id}`;

        fetch(url1)
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error!')
                }
                return response.json()
            })
            .then(json => { setMovie(json.data); setStatus('success'); })
            .catch(() => setStatus('error'));
    }, []);

    if (status === 'load') {
        return <h1>Loading...</h1>
    }

    if (status === 'error') {
        return <h1>Loading Error!</h1>
    }
    console.log(movie);
    return (
        <>
            <h1>{movie.title}</h1>
            <h5>Relise date {movie.year}</h5>
            <p>{movie.description}</p>
        </>
    );
};

export default AboutMovie;