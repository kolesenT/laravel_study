import { useRef, useState, useEffect } from "react";
import MovieListItem from "../components/MovieListItems";

const Movies = () => {
    const dataMovie = useRef(false);
    const [status, setStatus] = useState('load');
    const [movies, setMovies] = useState([]);

    useEffect(() => {
        if (dataMovie.current) {
            return;
        }
        dataMovie.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/movies`;

        fetch(url)
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error!')
                }
                return response.json()
            })
            .then(json => { setMovies(json.data); setStatus('success'); })
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
                {movies.map(movie =>
                    <MovieListItem
                        id={movie.id}
                        key={movie.id}
                        title={movie.title}
                        year={movie.year}
                        user={movie.user_id}
                        genres={movie.genres}
                        actors={movie.actors} />
                )}
            </div>
        </div>
    );
};

export default Movies;