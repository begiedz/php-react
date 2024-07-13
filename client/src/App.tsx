import { useEffect, useState } from "react"

interface ApiResponse {
  message: string
}

function App() {
  const [response, setResonse] = useState<ApiResponse | null>(null)

  useEffect(() => {
    fetch('http://localhost/api/')
      .then(res => res.json())
      .then(data => setResonse(data))
      .catch(err => console.error(err))
  }, [])

  useEffect(() => {
    console.log(response);
  }, [response])

  return (
    <>
      <h1>PHP response:</h1>
      <p>{response?.message && response.message}</p>
    </>
  )
}

export default App
